<template x-for="(row, rindex) in contentlist">
    <div class="flex flex-row space-x-2" :class="row.classes.join(' ')">
        <template x-for="(c, cindex) in row.cols">
            <div class="flex flex-col" :class="c.classes.join(' ')">
                <template x-for="(item,index) in c.items">
                    <div class="relative">
                        <div x-html="getPreviewHtml(item, rindex, cindex, index);"></div>
                        <div x-data="{
                                showeditform: false
                            }" @previewclick.window="
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
                                    <div class="flex flex-row space-x-2 p-2 justify-start items-center border-b borderbase-200 py-2">
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
                                        </div>
                                    </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </template>
</div>
</template>
