<?php
namespace App\TemplateHelpers;

use Modules\Ynotz\EasyAdmin\Services\FormHelper;
use Modules\Ynotz\EasyAdmin\Services\UILayout;

class SidebarRightTemplateHelper implements TemplatehelperInterface
{
    public function getCreatePageInputs(array $data = []): array
    {
        return [
            'title' => FormHelper::makeInput(
                inputType: 'text',
                key: 'title',
                label: 'Title',
            )
        ];
    }
    public function getEditPageInputs(array $data = []): array
    {
        return [];
    }
    public function getCreateFormLayout(UILayout $layout = null): UILayout|null
    {
        return $layout;
    }
    public function getEditFormLayout(UILayout $layout = null): UILayout|null
    {
        return $layout;
    }
}
