<div x-data="{
        currentTab: 0,
    }"
    @reseteditor.window="currentTab = 0;"
    class="relative">
    <div x-show="previewLoading" class="absolute h-full w-full flex justify-center items-center bg-white bg-opacity-60">
        <div class="text-secondary animate-spin bg-transparent rounded-full p-4">
            <x-easyadmin::display.icon icon="easyadmin::icons.gear" height="h-24" width="w-24" />
        </div>
    </div>
    <div x-show="currentTab == 1">
        <div class="flex justify-end bg-base-100 p-2 gap-4">
            <button @click.prevent.stop="hideEditor();" type="button" class="mt-2 px-4 py-2 bg-transparent text-error flex flex-row justify-center items-center">
                Cancel&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.close" />
            </button>
            <button @click.prevent.stop="setContentForSave();hideEditor();" type="button" class="btn btn-success btn-sm text-white">
                Set Content <x-easyadmin::display.icon icon="easyadmin::icons.tick" />
            </button>
            <button type="button" @click.prevent.stop="currentTab = 0;" class="btn btn-warning flex flex-row btn-sm gap-2 items-center">
                <x-easyadmin::display.icon icon="easyadmin::icons.edit" height="h-4" width="w-4" /> <span>Edit</span>
            </button>
        </div>
        <div class="bg-white text-black py-2 text-base" x-html="previewHtml"></div>
    </div>
    <div x-show="currentTab == 0">
        <div class="flex justify-end bg-base-100 p-2 gap-4">
            <button @click.prevent.stop="hideEditor();" type="button" class="mt-2 px-4 py-2 bg-transparent text-error flex flex-row justify-center items-center">
                Cancel&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.close" />
            </button>
            <button @click.prevent.stop="setContentForSave();hideEditor();" type="button" class="btn btn-success btn-sm text-white">
                Set Content <x-easyadmin::display.icon icon="easyadmin::icons.tick" />
            </button>
            <button type="button" @click.prevent.stop="getRenderedPreview();currentTab = 1;" class="btn btn-secondary flex flex-row btn-sm gap-2 items-center">
                <x-easyadmin::display.icon icon="easyadmin::icons.view_on" height="h-4" width="w-4" /> <span>Preview</span>
            </button>
        </div>
        <template x-for="(row, rindex) in contentlist">
            <div class="flex flex-row">
                <div class="flex flex-row border border-dotted border-base-content border-opacity-50" :class="row.classes">
                    <template x-for="(c, cindex) in row.cols">
                        <div class="flex flex-col border border-dotted border-base-content border-opacity-50 p-1" :class="c.classes">
                            <template x-for="(item,index) in c.items" :key="`${rindex}${cindex}${index}`">
                                <div class="relative">
                                    <div @click.outside="showitemoptions = false;" x-data="{showitemoptions: false}" class="absolute top-0 right-0 z-50 bg-base-content bg-opacity-70 rounded-full flex flex-row items-center p-0.5">
                                        <div x-show="showitemoptions" class="p-0">
                                            <button type="button" @click.stop.prevent="moveItem('up', rindex, cindex, index); showitemoptions = false;" class="btn btn-xs rounded-full" :disabled="index == 0">
                                                <x-easyadmin::display.icon icon="easyadmin::icons.up-arrow" height="h-3" width="w-3" />
                                            </button>
                                            <button type="button" @click.stop.prevent="moveItem('down', rindex, cindex, index); showitemoptions = false;" class="btn btn-xs rounded-full" :disabled="index == c.items.length - 1">
                                                <x-easyadmin::display.icon icon="easyadmin::icons.down-arrow" height="h-3" width="w-3" />
                                            </button>
                                            <button @click.prevent.stop="deleteItem(rindex, cindex, index)" class="btn btn-error btn-xs rounded-full bg-opacity-50" type="button">
                                                <x-easyadmin::display.icon icon="easyadmin::icons.close"
                                                    height="h-3" width="w-3" />
                                            </button>
                                        </div>
                                        <div class="p-0">
                                            <button @click.prevent.stop="showitemoptions = !showitemoptions" type="button" class="btn btn-xs rounded-full">
                                                <x-easyadmin::display.icon icon="easyadmin::icons.ellipsis-vertical"
                                                    height="h-3" width="w-3" />
                                            </button>
                                        </div>
                                    </div>
                                    <div class="min-h-10" x-html="getPreviewHtml(item, rindex, cindex, index);"></div>
                                    <div x-data="{
                                            showeditform: false
                                        }" @previewclick.window="
                                            console.log('preview click!');
                                            rowindex = $event.detail.row;
                                            colindex = $event.detail.col;
                                            itemindex = $event.detail.index;
                                            if (rowindex == rindex && colindex == cindex && itemindex == index) {
                                                showeditform = true;
                                            }
                                        "
                                        x-show="showeditform"
                                        class="absolute top-6 left-0 p-3 bg-base-200 rounded-md shadow-md z-50"
                                        @click.outside="showeditform = false;"
                                        >
                                        <div class="flex flex-row justify-end mb-3">
                                            <button type="button" @click="showeditform = false;" class="btn btn-error btn-sm">
                                                <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-4" width="w-4" />
                                            </button>
                                        </div>
                                        <template x-if="item.type == 'heading'">
                                            <div class="flex flex-row space-x-2">
                                                <textarea x-model="item.content" class="textarea textarea-sm textarea-bordered w-96" row="3"></textarea>
                                                <div class="flex flex-col space-y-2">
                                                    <select x-model="item.level" class="select select-sm select-bordered py-0">
                                                        <option value="1">H1</option>
                                                        <option value="2">H2</option>
                                                        <option value="3">H3</option>
                                                        <option value="4">H4</option>
                                                        <option value="5">H5</option>
                                                        <option value="6">H6</option>
                                                    </select>
                                                    <button @click="showeditform = false;" type="button" class="btn btn-success btn-sm">
                                                        <x-easyadmin::display.icon icon="easyadmin::icons.tick" height="h-4" width="w-4"/>
                                                    </button>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="item.type == 'yt_video'">
                                            <div class="relative z-50 flex gap-2 w-full">
                                                <input class="input input-sm input-bordered w-full" type="text" x-model="item.url" />
                                            </div>
                                        </template>
                                        <template x-if="item.type == 'img'">
                                            <div class="flex flex-col space-x-2 space-y-2">
                                                <div class="relative">
                                                    <img :src="item.url" alt="">
                                                    <div x-data="{
                                                            files: [],
                                                            url: '{{route('mediamanager.file_upload')}}',
                                                            validations: [],
                                                            multiple: false,
                                                            inputElement: null,
                                                            getInputElement() {
                                                                let elid = `imgfile-${rindex}${cindex}${index}`;
                                                                if (this.inputElement == null) {
                                                                    this.inputElement = document.getElementById(elid);
                                                                }
                                                                return this.inputElement;
                                                            },
                                                            validateType(file) {
                                                                if(this.validations.mimeTypes != undefined && this.validations.mimeTypes != null && this.validations.mimeTypes.length > 0 && this.validations.mimeTypes.indexOf(file.type) == -1) {
                                                                    return false;
                                                                }
                                                                return true;
                                                            },
                                                            validateSize(file) {
                                                                if (typeof this.validations.maxSize == 'undefined' || this.validations.maxSize == null) {
                                                                    return true;
                                                                }
                                                                let sizeArr = this.validations.maxSize.split(' ');
                                                                let size = sizeArr[0];
                                                                let unit = sizeArr[1];
                                                                let sizeBytes = size;
                                                                switch(unit.toLowerCase()) {
                                                                    case 'gb':
                                                                        sizeBytes = size * 1024 * 1024 * 1024;
                                                                        break;
                                                                    case 'mb':
                                                                        sizeBytes = size * 1024 * 1024;
                                                                        break;
                                                                    case 'kb':
                                                                        sizeBytes = size * 1024;
                                                                        break;
                                                                }

                                                                if(file.size > sizeBytes) {
                                                                    return false;
                                                                }

                                                                return true;
                                                            },
                                                            doUpload(files) {
                                                                if (!this.multiple) { this.files = []; }
                                                                for(i = 0; i < this.getInputElement().files.length; i++) {
                                                                    file = this.getInputElement().files[i];
                                                                    let isValidSize = this.validateSize(file);
                                                                    newFile = {
                                                                        file: file,
                                                                        name: file.name,
                                                                        uploaded_pc: 0,
                                                                        id: (new Date()).getTime() + Math.floor(Math.random() * 100),
                                                                        servername: '',
                                                                        url: '',
                                                                        show: true,
                                                                        fromServer: false,
                                                                        sizeValidation: isValidSize,
                                                                        typeValidation: this.validateType(file),
                                                                        error: false
                                                                    };
                                                                    if (!isValidSize) {
                                                                        this.compressAndUpload(newFile);
                                                                    } else {
                                                                        this.files.push(newFile);
                                                                        this.upoladFile(newFile);
                                                                    }
                                                                    // validate size
                                                                    // validate type
                                                                }
                                                                this.getInputElement().value = '';
                                                                {{-- if (this.getInputElement() != null) { this.getInputElement().value = ''; } --}}
                                                            },
                                                            compressAndUpload(img) {

                                                                new window.Compressor(img.file, {
                                                                    quality: 0.6,
                                                                    maxWidth: 750,
                                                                    maxHeight: 400,

                                                                    // The compression process is asynchronous,
                                                                    // which means you have to access the `result` in the `success` hook function.
                                                                    success: (result) => {
                                                                        img.file = result;
                                                                        img.sizeValidation = this.validateSize(img.file);
                                                                        this.files.push(img);
                                                                        this.upoladFile(img);
                                                                    },
                                                                    error(err) {
                                                                    console.log(err.message);
                                                                    },
                                                                });
                                                                return img;
                                                            },
                                                            upoladFile(file) {
                                                                let formData = new FormData();
                                                                formData.append('file', file.file);
                                                                formData.append('add_to_gallery', true);
                                                                formData.append('_token', '{{ csrf_token() }}');
                                                                axios.post(
                                                                    this.url,
                                                                    formData,
                                                                    {
                                                                        headers: {
                                                                            'Content-Type': 'multipart/form-data',
                                                                            'X-CSRF-Token': '{{ csrf_token() }}'
                                                                        },
                                                                        onUploadProgress: (event) => {
                                                                            let pc = Math.floor((event.loaded * 100) / event.total);
                                                                            this.files.forEach((f) => {
                                                                                if (f.id == file.id) { f.uploaded_pc = pc; }
                                                                            });
                                                                        },
                                                                    }
                                                                ).then((r) => {
                                                                    file.uploaded_pc = 100;
                                                                    this.files.forEach((f) => {
                                                                        if (f.id == file.id) {
                                                                            f.servername = r.data.name;
                                                                            f.url = r.data.url;
                                                                            $dispatch('filechanged', {row: rindex, col: cindex, itemindex: index, filedata: r.data});
                                                                        }
                                                                    });
                                                                }).catch((e) => {
                                                                    console.log(e);
                                                                });
                                                            },
                                                            fetchGalleryItems() {
                                                                if (this.galleryItems.length == 0) {
                                                                    let url = '{{route(config('mediaManager.gallery_route'))}}';
                                                                    axios.get(
                                                                        url
                                                                    ).then((r) => {
                                                                        this.galleryItems = r.data.items.map((i) => {
                                                                            let x = i;
                                                                            i.selected = false;
                                                                            return i;
                                                                        });
                                                                    }).catch((e) => {
                                                                        console.log(e);
                                                                    });
                                                                }
                                                            },
                                                            openGallery() {
                                                                this.fetchGalleryItems();
                                                                this.showGallery = true;
                                                            },
                                                            closeGallery() {
                                                                this.showGallery = false;
                                                            },
                                                            galleryClick(ulid) {
                                                                let item = this.galleryItems.filter((i) => {
                                                                    return i.ulid == ulid;
                                                                })[0];
                                                                if (item.selected) {
                                                                    this.deselectGalleryItem(item);
                                                                } else {
                                                                    this.selectGalleryItem(item);
                                                                }
                                                            },
                                                            selectGalleryItem(item) {
                                                                item.selected = true;
                                                                let check = this.files.filter((f) => {
                                                                    return f.servername == config('mediaManager.ulid_separator')+item.ulid;
                                                                });
                                                                if (check.length == 0) {
                                                                    let newFile = {
                                                                        file: null,
                                                                        name: item.name,
                                                                        uploaded_pc: 100,
                                                                        id: (new Date()).getTime() + Math.floor(Math.random() * 100),
                                                                        servername: this.ulidSeparator+item.ulid,
                                                                        url: item.url,
                                                                        show: true,
                                                                        fromServer: true,
                                                                        sizeValidation: true,
                                                                        typeValidation: true,
                                                                        error: false
                                                                    };
                                                                    this.files.push(newFile);
                                                                }
                                                            },
                                                            deselectGalleryItem(item) {
                                                                item.selected = false;
                                                                this.files = this.files.filter((f) => {
                                                                    return f.servername != this.ulidSeparator+item.ulid;
                                                                });
                                                            },
                                                        }">
                                                        <label type="button" :for="`imgfile-${rindex}${cindex}${index}`" class="btn btn-sm absolute right-1 bottom-1 text-warning">
                                                            Change
                                                        </label>
                                                        <input :id="`imgfile-${rindex}${cindex}${index}`" type="file" class="hidden" :accept="validations.mimeTypes != null ? validations.mimeTypes.join(', ') : '*'"
                                                        @change="doUpload()">
                                                    </div>
                                                </div>
                                                <div class="flex flex-row space-x-2">
                                                    <div class="form-control w-1/2">
                                                        <label>Alt Text</label>
                                                        <input x-model="item.attribs.alt" type="text" class="input input-sm input-bordered">
                                                    </div>
                                                    <div class="form-control w-1/4">
                                                        <label>Width (px)</label>
                                                        <input x-model="item.attribs.width" type="text" class="input input-sm input-bordered">
                                                    </div>
                                                    <div class="form-control w-1/4">
                                                        <label>Height (px)</label>
                                                        <input x-model="item.attribs.height" type="text" class="input input-sm input-bordered">
                                                    </div>
                                                </div>
                                                <button @click="showeditform = false;" type="button" class="btn btn-success btn-sm">
                                                    <x-easyadmin::display.icon icon="easyadmin::icons.tick" height="h-4" width="w-4"/>
                                                </button>
                                            </div>
                                        </template>
                                        <template x-if="item.type == 'list'">
                                            <div class="flex flex-col space-x-2 space-y-2">
                                                <div class="flex flex-row space-x-2 p-2 justify-start items-center border-b border-base-content border-opacity-20 py-2">
                                                    <label>List Type: </label>
                                                    <label :for="`ol-${rindex}${cindex}${index}`" class="px-3 py-1 rounded border border-base-content border-opacity-20" :class="item.listType != 'ol' || 'bg-warning'">Numbered</label>
                                                    <input :id="`ol-${rindex}${cindex}${index}`" class="hidden" type="radio" value="ol" x-model="item.listType">
                                                    <label :for="`ul-${rindex}${cindex}${index}`" class="px-3 py-1 rounded border border-base-content border-opacity-20" :class="item.listType != 'ul' || 'bg-warning'">Bullets</label>
                                                    <input :id="`ul-${rindex}${cindex}${index}`" class="hidden" type="radio" value="ul" x-model="item.listType">
                                                </div>
                                                <div>
                                                <template x-for="(li,x) in item.list">
                                                    <div class="my-2 flex flex-row space-x-2">
                                                        <input class="input input-sm input-bordered" type="text" x-model="li.text">
                                                        <label :for="`lib-${rindex}${cindex}${index}${x}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 font-bold" :class="!li.attribs.includes('B') || 'bg-warning'">B</label>
                                                        <input :id="`lib-${rindex}${cindex}${index}${x}`" class="hidden" type="checkbox" value="B" x-model="li.attribs">
                                                        <label :for="`liu-${rindex}${cindex}${index}${x}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 underline" :class="!li.attribs.includes('U') || 'bg-warning'">U</label>
                                                        <input :id="`liu-${rindex}${cindex}${index}${x}`" class="hidden" type="checkbox" value="U" x-model="li.attribs">
                                                        <label :for="`lii-${rindex}${cindex}${index}${x}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 italic" :class="!li.attribs.includes('I') || 'bg-warning'">I</label>
                                                        <input :id="`lii-${rindex}${cindex}${index}${x}`" class="hidden" type="checkbox" value="I" x-model="li.attribs">
                                                        <button type="button" @click="moveItem('up', rindex, cindex, index, x)" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center disabled:opacity-30" :disabled="x == 0">
                                                            <x-easyadmin::display.icon icon="easyadmin::icons.up-arrow" height="h-3" width="w-3" />
                                                        </button>
                                                        <button type="button" @click="moveItem('down', rindex, cindex, index, x)" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center disabled:opacity-30" :disabled="x == item.list.length - 1">
                                                            <x-easyadmin::display.icon icon="easyadmin::icons.down-arrow" height="h-3" width="w-3" />
                                                        </button>
                                                        <button type="button" @click="deleteItem(rindex, cindex, index, x)" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center disabled:opacity-30 text-error" :disabled="item.list.length == 1">
                                                            <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-3" width="w-3" />
                                                        </button>
                                                    </div>
                                                </template>
                                                </div>
                                                <div class="flex flex-row justify-center p-3">
                                                    <button type="button" @click="addItem(rindex, cindex, index)" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center text-success">
                                                        Add <x-easyadmin::display.icon icon="easyadmin::icons.plus" height="h-3" width="w-3" />
                                                    </button>
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="item.type == 'para'">
                                            <div x-data="{
                                                    currentIndex: null,
                                                    showDeleteConfirm: false,
                                                    data: {
                                                        text: '',
                                                        link: {
                                                            url: null,
                                                            external: false
                                                        },
                                                        attribs: []
                                                    },
                                                    setCurrentIndex(x) {
                                                        this.currentIndex = x;
                                                        this.data.text = contentlist[rindex].cols[cindex].items[index].content[this.currentIndex].text;
                                                        this.data.attribs = contentlist[rindex].cols[cindex].items[index].content[this.currentIndex].attribs || [];
                                                        this.data.link = contentlist[rindex].cols[cindex].items[index].content[this.currentIndex].link || {url: null, external: false};
                                                        console.log('data after setting index');
                                                        console.log(this.data);
                                                    },
                                                    setParaContent() {
                                                        let itemData = JSON.parse(JSON.stringify(this.data));
                                                        if (itemData.link.url == null) {
                                                            itemData.link = null;
                                                        }
                                                        contentlist[rindex].cols[cindex].items[index].content[this.currentIndex] = itemData;
                                                        this.reset();
                                                    },
                                                    addParaContent() {
                                                        let itemData = JSON.parse(JSON.stringify(this.data));
                                                        if (itemData.link.url == null) {
                                                            itemData.link = null;
                                                        }
                                                        contentlist[rindex].cols[cindex].items[index].content.push(itemData);
                                                        this.reset();
                                                    },
                                                    reset() {
                                                        this.currentIndex = null;
                                                        this.data = {
                                                            text: '',
                                                            link: {
                                                                url: null,
                                                                external: false
                                                            },
                                                            attribs: []
                                                        };
                                                        this.showDeleteConfirm = false;
                                                    },
                                                    doDelete() {
                                                        this.showDeleteConfirm = false;
                                                        deleteItem(rindex, cindex, index, this.currentIndex);
                                                        this.reset();
                                                    }
                                                }"
                                                x-init="
                                                    $watch('data', (d) => {console.log('data:'); console.log(d);});
                                                "
                                                class="flex flex-col min-w-150">
                                                <div class="flex flex-col p-2 border-2 rounded-md" :class="currentIndex == null ? 'border-success' : 'border-warning'">
                                                    <h3 class="my-2 font-bold" x-text="currentIndex == null ? 'Add New Text' : 'Edit text'"></h3>
                                                    <div class="my-2">
                                                        <div>
                                                            <label class="label">Text</label>
                                                            <textarea rows="3" class="textarea textarea-sm textarea-bordered w-full disabled:bg-base-100"
                                                            x-model="data.text"></textarea>
                                                        </div>
                                                        <div class="flex flex-row w-full space-x-2 items-end mt-2">
                                                            <div class="flex-grow">
                                                                <label class="label">Link</label>
                                                                <input type="text" class="input input-sm w-full input-bordered"
                                                                x-model="data.link.url">
                                                            </div>
                                                            <div class="flex flex-row space-x-2 justify-start items-baseline">
                                                                <input :id="`lext-${rindex}${cindex}${index}`" type="checkbox" class="checkbox checkbox-sm"
                                                                x-model="data.link.external">
                                                                <label :for="`lext-${rindex}${cindex}${index}`">External?</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-row justify-between">
                                                        <div class="my-2 flex flex-row space-x-2">
                                                            <label :for="`parab-${rindex}${cindex}${index}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 font-bold" :class="!data.attribs.includes('b') ? 'opacity-70' : 'bg-success'">B</label>
                                                            <input :id="`parab-${rindex}${cindex}${index}`" class="hidden" type="checkbox" value="b" x-model="data.attribs">
                                                            <label :for="`parau-${rindex}${cindex}${index}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 underline" :class="!data.attribs.includes('u') ? 'opacity-70' : 'bg-success'">U</label>
                                                            <input :id="`parau-${rindex}${cindex}${index}`" class="hidden" type="checkbox" value="u" x-model="data.attribs">
                                                            <label :for="`parai-${rindex}${cindex}${index}`" class="px-3 py-1 rounded border border-base-content border-opacity-20 italic" :class="!data.attribs.includes('i') ? 'opacity-70' : 'bg-success'">I</label>
                                                            <input :id="`parai-${rindex}${cindex}${index}`" class="hidden" type="checkbox" value="i" x-model="data.attribs">
                                                            <button type="button" @click="moveItem('up', rindex, cindex, index, currentIndex); currentIndex--;" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center text-success disabled:opacity-30 disabled:text-base-content" :disabled="currentIndex == null || currentIndex == 0">
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.arrow-left" height="h-3" width="w-3" />
                                                            </button>
                                                            <button type="button" @click="moveItem('down', rindex, cindex, index, currentIndex); currentIndex++;" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center text-success disabled:opacity-30 disabled:text-base-content" :disabled="currentIndex == null || currentIndex == item.content.length - 1">
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.arrow-right" height="h-3" width="w-3" />
                                                            </button>
                                                            <button type="button" @click="showDeleteConfirm = true;" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center disabled:opacity-30 disabled:text-base-content text-error" :disabled="currentIndex == null">
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-3" width="w-3" />
                                                            </button>
                                                            <button x-show="showDeleteConfirm" type="button" @click="doDelete();" class="px-3 py-1 rounded border border-base-content border-opacity-20 flex flex-row justify-center items-center disabled:opacity-30 text-error" :disabled="item.content.length == 1">
                                                                Confirm Delete
                                                            </button>
                                                        </div>
                                                        <div class="my-2 flex flex-row space-x-4 items-end">
                                                            <button @click.prevent.stop="reset();" type="button" class="btn btn-sm flex flex-row text-error">
                                                                <span>Reset</span>
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.delete" height="h-3" width="w-3" />
                                                            </button>
                                                            <button x-show="currentIndex == null" @click.prevent.stop="addParaContent();" type="button" class="btn btn-sm flex flex-row btn-success" :disabled="data.text.length == 0">
                                                                <span>Add</span>
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.tick" height="h-3" width="w-3" />
                                                            </button>
                                                            <button x-show="currentIndex != null" @click.prevent.stop="setParaContent();" type="button" class="btn btn-sm btn-warning flex flex-row" :disabled="data.text.length == 0">
                                                                <span>Update</span>
                                                                <x-easyadmin::display.icon icon="easyadmin::icons.tick" height="h-3" width="w-3" />
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-row flex-wrap space-x-2 border border-base-content border-opacity-20 rounded-md p-3">
                                                    <template x-for="(ix, xindex) in item.content">
                                                        <span class="relative rounded-sm">
                                                                <span x-text="item.content[xindex].text" class="hover:bg-warning inline-block rounded-sm" :class="{'text-warning' : currentIndex == xindex, 'underline' : item.content[xindex].link != null && item.content[xindex].link.url != null}"></span>
                                                                <button type="button" class="absolute -top-2 right-0 z-40" :class="currentIndex != xindex ? 'text-secondary' : 'text-success'" @click="setCurrentIndex(xindex)">
                                                                    <x-easyadmin::display.icon icon="easyadmin::icons.edit" height="h-4" width="w-4"/>
                                                                </button>
                                                        </span>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                            <div x-data="{
                                    showclasses: false
                                }" class="flex flex-row space-x-2 justify-center items-center relative">
                                <span class="text-warning">Add: </span>
                                <button type="button" @click.stop.prevent="addColItem(rindex, cindex, 'heading')"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                    H
                                </button>
                                <button type="button" @click.stop.prevent="addColItem(rindex, cindex, 'para')"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                    T
                                </button>
                                <button type="button" @click.stop.prevent="addColItem(rindex, cindex, 'img')"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                <x-easyadmin::display.icon icon="easyadmin::icons.photo" height="h-3" width="w-3" />
                                <button type="button" @click.stop.prevent="addColItem(rindex, cindex, 'yt_video')"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                <x-easyadmin::display.icon icon="icons.video" height="h-3" width="w-3" />
                                </button>
                                <button type="button" @click.stop.prevent="addColItem(rindex, cindex, 'list')"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                <x-easyadmin::display.icon icon="easyadmin::icons.bullet-list" height="h-3" width="w-3" />
                                </button>
                                <button type="button" @click.stop.prevent="showclasses = true;"
                                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                                <x-easyadmin::display.icon icon="easyadmin::icons.curly-braces" height="h-3" width="w-3" />
                                </button>
                                <div @click.outside="showclasses = false;" x-show="showclasses" class="w-auto absolute z-50 flex flex-row justify-center space-x-4 bg-base-200 border border-base-300 shadow-md p-2 rounded-md items-start">
                                    <div><input class="input input-sm w-52 input-bordered" type="text" x-model="c.classes"><br><span class="text-xs text-warning italic">Classes separated by spaces</span></div>

                                    <button type="button" @click.stop.prevent="showclasses = false;"
                                    class="btn btn-xs rounded-full flex flex-row items-center justify-center rouded-full btn-warning">
                                    <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-3" width="w-3" />
                                    </button>

                                </div>
                            </div>
                        </div>
                    </template>
            </div>
            <div x-data="{showclasses: false}" class="flex flex-col justify-center items-center space-y-2">
                <button type="button" @click.stop.prevent="moveItem('up', rindex)"
                class="btn btn-xs rounded-full" :disabled="rindex == 0">
                    <x-easyadmin::display.icon icon="easyadmin::icons.up-arrow" height="h-3" width="w-3" />
                </button>
                <button type="button" @click.stop.prevent="moveItem('down', rindex)"
                class="btn btn-xs rounded-full" :disabled="rindex == contentlist.length -1">
                    <x-easyadmin::display.icon icon="easyadmin::icons.down-arrow" height="h-3" width="w-3" />
                </button>
                <button type="button" @click.stop.prevent="deleteItem(rindex)"
                class="btn btn-xs btn-error bg-opacity-60 rounded-full">
                    <x-easyadmin::display.icon icon="easyadmin::icons.delete" height="h-3" width="w-3" />
                </button><button type="button" @click.stop.prevent="showclasses = true;"
                class="btn btn-xs rounded-full flex flex-row items-center justify-center">
                <x-easyadmin::display.icon icon="easyadmin::icons.curly-braces" height="h-3" width="w-3" />
                </button>
                <div class="relative overflow-visible">
                    {{-- <div @click.outside="showclasses = false;" x-show="showclasses" class="w-auto absolute bottom-2 -right-1 flex flex-row justify-center items-center bg-base-200 border border-base-300 shadow-md p-1">
                        <input class="input input-xs input-bordered" type="text" x-model="row.classes">
                        <button type="button" @click.stop.prevent="showclasses = false;"
                        class="btn btn-xs text-error rounded-full flex flex-row items-center justify-center">
                        <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-3" width="w-3" />
                    </div> --}}
                    <div @click.outside="showclasses = false;" x-show="showclasses" class="w-auto absolute right-0 z-50 flex flex-row justify-center space-x-4 bg-base-200 border border-base-300 shadow-md p-2 rounded-md items-start">
                        <div><input class="input input-sm w-52 input-bordered" type="text" x-model="row.classes"><br><span class="text-xs text-warning italic">Classes separated by spaces</span></div>

                        <button type="button" @click.stop.prevent="showclasses = false;"
                        class="btn btn-xs rounded-full flex flex-row items-center justify-center rouded-full btn-warning">
                        <x-easyadmin::display.icon icon="easyadmin::icons.close" height="h-3" width="w-3" />
                        </button>

                    </div>
                </div>
            </div>
        </div>
        </template>
    </div>
</div>
