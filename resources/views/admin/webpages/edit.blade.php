<x-easyadmin::partials.adminpanel>
    <div>
        <h3 class="text-xl font-bold px-1 pb-3"><span>Create Page</span>&nbsp;</h3>
        <div class="px-1">
            <div x-data="{
                    templateId: '',
                    webpageId: '',
                    allTemplates: [],
                    form: '',
                    fetchForm() {
                        axios.get(
                            '{{route('template.get')}}',
                            {
                                params: {
                                    'template_id': this.templateId,
                                    'webpage_id': this.webpageId,
                                    'form_type': 'edit'
                                }
                            }
                        ).then((r) => {
                            this.form = r.data.form;
                        }).catch((e) => {
                            console.log(e);
                        });
                    },
                    saveTranslation(form) {
                        let fd = new FormData(form);
                        axios.post(
                            '{{route('webpages.update', ['id' => $webpageId])}}',
                            fd,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                },
                            }
                        ).then((r) => {
                            if (r.data.success) {
                                $dispatch('showtoast', {
                                    mode: 'success',
                                    message: 'Page updated.'
                                });
                                $dispatch('linkaction', {
                                    route: 'webpages.index',
                                    link: '{{route('webpages.index')}}',
                                    fresh: true
                                });
                            }
                        }).catch((e) => {
                            console.log(e);
                        });
                    }
                }"
                x-init="
                    $nextTick(() => {
                        allTemplates = {{Js::from($templates)}};
                        webpageId = {{Js::from($webpageId)}};
                        $watch('templateId', (v) => {
                            fetchForm();
                        });
                        templateId = {{Js::from($templateId)}};
                    });
                ">
                <form class="mb-8" @submit.prevent.stop="" action="#">
                    <label class="label">Choose a page template</label>
                    <select x-model="templateId" class="select select-bordered w-full max-w-xs" disabled>
                        <option value="" disabled>Select</option>
                        <template x-for="t in allTemplates">
                        <option :value="t.id" x-text="t.name"></option>
                        </template>
                    </select>
                </form>
                <div>
                    <div x-html="form"></div>
                </div>
            </div>
        </div>
    </div>
</x-easyadmin::partials.adminpanel>
