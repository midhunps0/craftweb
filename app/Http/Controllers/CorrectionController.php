<?php
namespace App\Http\Controllers;

use App\Models\Translation;

class CorrectionController extends Controller
{
    public function correctTranslationUrls()
    {
        $oldUrl = 'http://craft.ynotzitsolutions.com';
        $newUrl = 'https://craftivf.com';
        $tranlsations = Translation::all();

        foreach ($tranlsations as $t) {
            $data = $t->data;

            if (isset($data['body'])) {
                $data['body'] = str_replace($oldUrl, $newUrl, $data['body']);
            }

            $t->data = $data;
            $t->save();
        }

        return 'ok';
    }
}
?>
