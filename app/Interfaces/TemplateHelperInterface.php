<?php
namespace App\Interfaces;

use Modules\Ynotz\EasyAdmin\Services\UILayout;

interface TemplateHelperInterface
{
    public function getCreatePageInputs(array $data = []): array;
    public function getEditPageInputs(array $data = []): array;
    public function getCreateFormLayout(UILayout $layout = null): UILayout|null;
    public function getEditFormLayout(UILayout $layout = null): UILayout|null;
}
