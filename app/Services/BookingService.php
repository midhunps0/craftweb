<?php
namespace App\Services;

use Carbon\Carbon;
use Exception;
use Modules\Ynotz\AppSettings\Models\AppSetting;

class BookingService
{
    private $solverToken;
    private $solverDomain;

    public function __construct()
    {
        $this->solverDomain = config('app_settings.solver_domain');
        $today = Carbon::now()->startOfDay();
        $token = AppSetting::where('slug', 'solver_token')
            ->where('created_at', '>', $today)
            ->orWhere('updated_at', '>', $today)
            ->get()->first();
        if ($token == null) {
            $newToken = $this->fetchToken();
            if (!isset($newToken)) {
                info('Fetching token failed');
                // throw new Exception('Failed to connect to booking server');
                // return null;
            } else {
                $token = AppSetting::where('slug', 'solver_token')
                ->get()->first();
                $token->value = $newToken;
                $token->updated_at = Carbon::now();
                $this->solverToken = $newToken;
            }
        } else {
            $this->solverToken = $token->value;
        }
    }

    public function initData() {
        $specialties = $this->fetchSpecialties();
        $doctors = $this->fetchDoctors();
        return [
            'success' => true,
            'doctors' => $doctors,
            'specialties' => $specialties
        ];
    }

    public function fetchSpecialties()
    {
        info('trying to fetch specialties');
        $url = $this->solverDomain.config('app_settings.solver_specialties_url');

        $result = $this->doCurl(
            url: $url,
            bearerToken: $this->solverToken
        );
        if ($result['success']) {
            return $result['result']->PayLoad;
        } else {
            throw new Exception('Failed to fetch specialties');
        }

    }

    public function fetchDoctors()
    {
        info('trying to fetch doctors');
        $url = $this->solverDomain.config('app_settings.solver_doctors_url');
        $result = $this->doCurl(
            url: $url,
            bearerToken: $this->solverToken
        );
        return $result['result']->PayLoad;
    }

    public function fetchDates($specialtyCode, $doctorId)
    {
        info('trying to fetch dates');
        $url = $this->solverDomain.config('app_settings.solver_dates_url');
        $data = [
            'SP_CD' => $specialtyCode,
            'CONS_ID' => $doctorId,
            'NO_OF_DAYS' => config('app_settings.solver_adv_booking_days')
        ];
        $result = $this->doCurl(
            url: $url,
            bearerToken: $this->solverToken,
            data: $data
        );
        info('dates list:');
        info($result);
        $rdates = $result['result']->PayLoad;
        if (property_exists($rdates[0], 'AvailableDate')) {
            $dates = array_map(
                function ($d) {
                    $x = Carbon::createFromFormat('d-m-Y', $d->AvailableDate);
                    return [
                        'return_date' => $x->format('Y.m.d'),
                        'display_date' => $x->format('D, M d')
                    ];
                },
                $rdates
            );
        } else {
            $dates = [];
        }

        return [
            'success' => true,
            'dates' => $dates
        ];
    }

    public function fetchSlots($specialtyCode, $doctorId, $date)
    {
        info('trying to fetch dates');
        $url = $this->solverDomain.config('app_settings.solver_slots_url');
        $data = [
            'SP_CD' => $specialtyCode,
            'CONS_ID' => $doctorId,
            'SELECTED_DATE' => $date
        ];
        $result = $this->doCurl(
            url: $url,
            bearerToken: $this->solverToken,
            data: $data
        );
        info('dates list:');
        info($result);
        $rslots = $result['result']->PayLoad;
        if (property_exists($rslots[0], 'AvailableSlot')) {
            $slots = array_map(
                function ($d) {
                    $x = explode(':', $d->AvailableSlot);
                    $m = intval($x[0]);
                    $rt = $m <= 12 ? $m : $m - 12;
                    $suffix = $m < 12 ? ' AM' : ' PM';

                    return [
                        'return_time' => implode(':', [$x[0], $x[1]]),
                        'display_time' => implode(':', [str_pad($rt, 2, '0', STR_PAD_LEFT), $x[1].$suffix]),
                    ];
                },
                $rslots
            );
        } else {
            $slots = [];
        }

        return [
            'success' => true,
            'slots' => $slots
        ];
    }

    public function confirmBOoking($transaction)
    {
        info('trying to confirm booking..');
        $url = $this->solverDomain.config('app_settings.solver_booking_url');
        $data = [
            'SP_CD' => $transaction->sp_cd,
            'CONS_ID' => $transaction->cons_id,
            'SELECTED_DATE' => $transaction->selected_date,
            'SELECTED_TIME' => $transaction->selected_time,
            'PHONE_NUMBER' => $transaction->phone,
            'NAME' => $transaction->name,
        ];
        $result = $this->doCurl(
            url: $url,
            data: $data,
            bearerToken: $this->solverToken
        );
        return $result['result'];
    }

    public function fetchToken()
    {
        info('trying to fetch token');
        $data = [
            'UserID' => config('app_settings.solver_userid'),
            'UserPassword' => config('app_settings.solver_password'),
        ];

        $result = $this->doCurl(
            url: $this->solverDomain.config('app_settings.solver_token_url'),
            data: $data
        );
        if ($result['success']) {
            info('curl result');
            info($result);
            return $result['result']->PayLoad;
        }
        return null;
    }

    public function doCurl($url, $data = [], $method = 'POST', $bearerToken = null)
    {
        $curl = curl_init();
        $headers = array(
            // Set here requred headers
            'accept: */*',
            // "accept-language: en-US,en;q=0.8",
            'content-type: application/json',
        );
        info('Authorization: Bearer '.$bearerToken);
        if (isset($bearerToken)) {
            $headers[] = 'Authorization: Bearer '.$bearerToken;
        }

        $curlData = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            //CURLOPT_HTTPHEADER => $headers,
        );
        // if ($method == 'POST' && isset($data)) {
            info('json_encode($data)');
            info(json_encode($data));
            $curlData[CURLOPT_POSTFIELDS] = json_encode($data);
        // }
        $curlData[CURLOPT_HTTPHEADER] = $headers;
        curl_setopt_array($curl, $curlData);

        $response = curl_exec($curl);
        info('response');
        info($response);

        $e = curl_error($curl);

        curl_close($curl);
        $r = json_decode($response);
        if ($e || !isset(($r->PayLoad))) {
            info('curl error');
            info($e);
            return [
                'success' => false,
                'error' => $e
            ];
            // echo "cURL Error #:" . $err;
        } else {
        //   print_r(json_decode($response));
            return [
                'success' => true,
                'result' => $r
            ];
        }
    }
}
?>
