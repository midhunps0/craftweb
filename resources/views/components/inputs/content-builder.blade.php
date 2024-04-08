@props(['key', 'contentdata' => null])
<div>
    <div x-data="{
            htmltext: '',
            contentlist: [],
            listforsave: [],
            editorVisible: false,
            previewLoading: false,
            previewHtml: '',
            contentDataDivId: 'contentdata-{{rand(100, 10000)}}',
            showEditor() {
                this.contentlist = JSON.parse(JSON.stringify(this.listforsave));
                this.editorVisible = true;
                $dispatch('reseteditor');
            },
            hideEditor() {
                this.editorVisible = false;
            },
            addRow(ratio = ['w-full']) {
                let theRow = {
                    cols: [],
                    classes: 'w-full'
                };
                ratio.forEach((c) => {
                    theRow.cols.push(
                        {
                            classes: c,
                            items: []
                        }
                    );
                });
                this.contentlist.push(theRow);
                console.log('this.contentlist');
                console.log(this.contentlist);
            },
            getPreviewHtml(item, r, c, i) {
                let str = '';
                switch(item.type) {
                    case 'heading':
                        str = this.getHeadingPreview(item, r, c, i);
                        break;
                    case 'list':
                        str = this.getListPreview(item, r, c, i);
                        break;
                    case 'img':
                        str = this.getImgPreview(item, r, c, i);
                        break;
                    case 'tsixty_img':
                        str = this.getTsixtyImgPreview(item, r, c, i);
                        break;
                    case 'yt_video':
                        str = this.getYtVideoPreview(item, r, c, i);
                        break;
                    case 'para':
                        str = this.getParaPreview(item, r, c, i);
                        break;
                }
                return str;
            },
            getHeadingPreview(item, r, c, i) {
                return `<h${item.level} @click='previewclick(${r},${c},${i})' class=\'preview-item\'>${item.content}</h${item.level}>`;
            },
            getImgPreview(item, r, c, i) {
                return `<div @click='previewclick(${r},${c},${i})' class=\'preview-item\'><img src='${item.url}'></div>`;
            },
            getTsixtyImgPreview(item, r, c, i) {
                return `<div @click='previewclick(${r},${c},${i})' class=\'relative preview-item\'><div class=\'relative w-full z-20\' style=\'padding-bottom:56.25%;\'><iframe src='${item.url}' width='${item.width}' height='${item.height}' class='absolute z-0 w-full h-full' style='border:0;'' allowfullscreen='' loading='lazy'></iframe><div class='absolute w-full h-full z-10'></div</div></div>`;
            },
            getYtVideoPreview(item, r, c, i) {
                return `<div @click='previewclick(${r},${c},${i})' class=\'relative z-20 preview-item\'><div class=\'relative w-full z-20\' style=\'padding-bottom:56.25%;\'><iframe class='absolute z-0 w-full h-full' width='100%' height='100%' src='${item.url}' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe><div class='absolute w-full h-full z-10'></div</div></div>`;
            },
            getListPreview(item, r, c, i) {
                let str = `<${item.listType} @click='previewclick(${r},${c},${i})' class=\'preview-item\'>`;
                    item.list.forEach((l) => {
                        let atrStart = l.attribs.reduce((r, x) => {
                            return r + `<${x}>`;
                        }, '');
                        let atrEnd = l.attribs.reverse().reduce((r, x) => {
                            return r + `</${x}>`;
                        }, '');
                        str += `<li>${atrStart}${l.text}${atrEnd}</li>`;
                    });
                str += `</${item.listType}>`;
                return str;
            },
            getParaPreview(theitem, r, c, i) {
                let str = `<div @click='previewclick(${r},${c},${i})' class=\'preview-item\'>`;
                theitem.content.forEach((item) => {
                    let atrStart = item.attribs != null ? item.attribs.reduce((r, x) => {
                        return r + `<${x}>`;
                    }, '') : '';
                    let atrEnd = item.attribs != null ? item.attribs.reverse().reduce((r, x) => {
                        return r + `</${x}>`;
                    }, '') : '';
                    let contenthtml = `<span>${atrStart}${item.text}${atrEnd}</span> `;
                    if (typeof item.link != 'undefined' && item.link != null) {
                        let target = item.link.exteral ? `target='_blank'` : ``;
                        let aTag = `<a @click.prevent.stop='' class='text-primary' href='${item.link.url}' ${target}>`;
                            contenthtml = `${aTag}${contenthtml}</a> `;
                    }
                    str += contenthtml;

                });
                str = str.trim();
                str += `</div>`;
                return str;
            },
            previewclick(r,c,i) {
                $dispatch('previewclick', {row: r, col: c, index: i});
            },
            updateFiledata(data) {
                this.contentlist[data.row].cols[data.col].items[data.itemindex].url = data.filedata.url;
                this.contentlist[data.row].cols[data.col].items[data.itemindex].ulid = data.filedata.ulid;
            },
            moveItem(dir, row, col = null, index = null, xindex = null) {
                let itemType = 'row';
                if (col != null) {
                    itemType = 'col';
                }
                if (index != null) {
                    itemType = 'colitem';
                }
                if (xindex != null) {
                    itemType = 'contentitem';
                }
                switch(itemType) {
                    case 'row':
                        this.moveRow(dir, row);
                        break;
                    case 'col':
                        this.moveCol(dir, row, col);
                        break;
                    case 'colitem':
                        this.moveColItem(dir, row, col, index);
                        break;
                    case 'contentitem':
                        this.moveContentItem(dir, row, col, index, xindex);
                        break;
                }
            },
            moveRow(dir, row) {
                let replaceIndex =  dir == 'up' ? row - 1 : row + 1;
                dummy = JSON.parse(JSON.stringify(this.contentlist[replaceIndex]));
                this.contentlist[replaceIndex] = JSON.parse(JSON.stringify(this.contentlist[row]));
                this.contentlist[row] = dummy;
            },
            moveCol(dir, row, col) {
                let replaceIndex =  dir == 'up' ? col - 1 : col + 1;
                dummy = JSON.parse(JSON.stringify(this.contentlist[row].cols[replaceIndex]));
                this.contentlist[row].cols[replaceIndex] = JSON.parse(JSON.stringify(this.contentlist[row].cols[col]));
                this.contentlist[row].cols[col] = dummy;
            },
            moveColItem(dir, row, col, index) {
                let replaceIndex =  dir == 'up' ? index - 1 : index + 1;
                dummy = JSON.parse(JSON.stringify(this.contentlist[row].cols[col].items[replaceIndex]));
                this.contentlist[row].cols[col].items[replaceIndex] = JSON.parse(JSON.stringify(this.contentlist[row].cols[col].items[index]));
                this.contentlist[row].cols[col].items[index] = dummy;
            },
            moveContentItem(dir, row, col, index, xindex) {
                let replaceIndex = dir == 'up' ? xindex - 1 : xindex + 1;
                let dummy = null;
                switch(this.contentlist[row].cols[col].items[index].type) {
                    case 'list':
                        dummy = this.contentlist[row].cols[col].items[index].list[replaceIndex];
                        this.contentlist[row].cols[col].items[index].list[replaceIndex] = this.contentlist[row].cols[col].items[index].list[xindex];
                        this.contentlist[row].cols[col].items[index].list[xindex] = dummy;
                        break;
                    case 'para':
                        dummy = this.contentlist[row].cols[col].items[index].content[replaceIndex];
                        this.contentlist[row].cols[col].items[index].content[replaceIndex] = this.contentlist[row].cols[col].items[index].content[xindex];
                        this.contentlist[row].cols[col].items[index].content[xindex] = dummy;
                        break;
                }
            },
            deleteItem(row, col = null, index = null, xindex = null) {
                let itemType = 'row';
                if (col != null) {
                    itemType = 'col';
                }
                if (index != null) {
                    itemType = 'colitem';
                }
                if (xindex != null) {
                    itemType = 'contentitem';
                }
                switch(itemType) {
                    case 'row':
                        this.deleteRow(row);
                        break;
                    case 'col':
                        this.deleteCol(row, col);
                        break;
                    case 'colitem':
                        this.deleteColItem(row, col, index);
                        break;
                    case 'contentitem':
                        this.deleteContentItem(row, col, index, xindex);
                        break;
                }
            },
            deleteRow(row) {
                this.contentlist = this.contentlist.filter((x, i) => {
                    return i != row;
                });
            },
            deleteCol(row, col) {},
            deleteColItem(row, col, index) {
                this.contentlist[row].cols[col].items = this.contentlist[row].cols[col].items.filter((ci, ciIndex) => {
                    return ciIndex  != index;
                });
            },
            deleteContentItem(row, col, index, xindex) {
                switch(this.contentlist[row].cols[col].items[index].type) {
                    case 'list':
                        this.contentlist[row].cols[col].items[index].list = this.contentlist[row].cols[col].items[index].list.filter((li, liIndex) => {
                            return liIndex  != xindex;
                        });
                        break;
                    case 'para':
                        this.contentlist[row].cols[col].items[index].content = this.contentlist[row].cols[col].items[index].content.filter((ci, ciIndex) => {
                            return ciIndex  != xindex;
                        });
                        break;
                }
            },
            addItem(row = null, col = null, index = null) {
                let itemType = 'row';
                if (row != null) {
                    itemType = 'col';
                }
                if (col != null) {
                    itemType = 'colitem';
                }
                if (index != null) {
                    itemType = 'contentitem';
                }
                switch(itemType) {
                    case 'row':
                        break;
                    case 'col':
                        this.addCol(row);
                        break;
                    case 'contentitem':
                        this.addContentItem(row, col, index);
                        break;
                }
            },
            addCol(row) {},
            addColItem(row, col, type) {
                switch(type) {
                    case 'heading':
                        this.contentlist[row].cols[col].items.push({
                            type: 'heading',
                            level: 3,
                            content: '--- Heading text ---'
                        });
                        break;
                    case 'para':
                        this.contentlist[row].cols[col].items.push({
                            type: 'para',
                            content: [
                                {
                                    text: '-- Paragraph text --',
                                    attribs: [],
                                    link: null
                                },
                            ]
                        });
                        break;
                    case 'img':
                        this.contentlist[row].cols[col].items.push({
                            type: 'img',
                            url: '/images/placeholder800x450.png',
                            ulid: '',
                            attribs: {
                                width: '',
                                height: '',
                                alt: '',
                                classes: ''
                            }
                        });
                        break;
                    case 'tsixty_img':
                        this.contentlist[row].cols[col].items.push({
                            type: 'tsixty_img',
                            url: 'https://www.google.com/maps/embed?pb=!4v1630682757286!6m8!1m7!1sCAoSLEFGMVFpcE9xVzBtMGQ0X2RTU0FlMS12UUo1S05pT3dhVGxVUmktamgxSkl2!2m2!1d10.234236!2d76.1934461!3f319.6792395640726!4f-4.865751855274624!5f0.7820865974627469',
                            ulid: '',
                            attribs: {
                                width: '',
                                height: '',
                                alt: '',
                                classes: ''
                            }
                        });
                        break;
                    case 'yt_video':
                        this.contentlist[row].cols[col].items.push({
                            type: 'yt_video',
                            url: 'https://www.youtube.com/embed/u31qwQUeGuM?si=RSWgLQ0pvAUSA-4T',
                        });
                        break;
                    case 'list':
                        this.contentlist[row].cols[col].items.push({
                            type: 'list',
                            list: [
                                {
                                    text: 'item 1',
                                    attribs: []
                                },
                                {
                                    text: 'item 2',
                                    attribs: []
                                },
                                {
                                    text: 'item 3',
                                    attribs: []
                                },
                            ],
                            listType: 'ol'
                        });
                        break;
                }
            },
            addContentItem(row, col, index) {
                switch(this.contentlist[row].cols[col].items[index].type) {
                    case 'list':
                        this.contentlist[row].cols[col].items[index].list.push({
                            text: '',
                            attribs: []
                        });
                        break;
                    case 'para':
                        break;
                }
            },
            setContentForSave() {
                this.listforsave = JSON.parse(JSON.stringify(this.contentlist));
                this.htmltext = JSON.stringify(this.listforsave);
                this.getRenderedPreview();
            },
            decodeHtml(html) {
                let txt = document.createElement('textarea');
                txt.innerHTML = html;
                return txt.value;
            },
            getRenderedPreview() {
                this.previewLoading = true;
                axios.get(
                    '{{route('layoutbuilder.preview')}}',
                    {
                        params: {
                            'content': JSON.stringify(this.contentlist),
                        }
                    }
                ).then((r) => {
                    this.previewHtml = r.data.preview_html;
                    this.previewLoading = false;
                }).catch((e) => {
                    console.log(e);
                    this.previewLoading = false;
                });
            },
            copyToClipboard(rindex = null, cindex = null) {
                if (rindex == null || cindex == null) {
                    navigator.permissions.query({ name: 'clipboard-write' }).then((result) => {
                        if (result.state == 'granted' || result.state == 'prompt') {
                            if (this.listforsave.length != 0) {
                                navigator.clipboard.writeText(JSON.stringify(this.listforsave)).then((s) => {
                                    $dispatch('showtoast', {message: 'Content copied to clipboard', mode: 'warning'});
                                }).catch((e) => {
                                    console.log(e);
                                    $dispatch('showtoast', {message: 'Can\'t copy to clipboard. Permission denied', mode: 'error'});
                                });
                            } else {
                                $dispatch('showtoast', {message: 'Nothing to copy', mode: 'error'});
                            }
                        } else {
                            $dispatch('showtoast', {message: 'Can\'t copy to clipboard. Permission denied', mode: 'error'});
                        }
                    });
                } else {
                    console.log('this.contentlist');
                    console.log(this.contentlist);
                    navigator.permissions.query({ name: 'clipboard-write' }).then((result) => {
                        if (result.state == 'granted' || result.state == 'prompt') {
                            console.log(this.contentlist[rindex].cols[cindex]);
                            navigator.clipboard.writeText(JSON.stringify(this.contentlist[rindex].cols[cindex])).then((s) => {
                                $dispatch('showtoast', {message: 'Content copied to clipboard', mode: 'warning'});
                            }).catch((e) => {
                                console.log(e);
                                $dispatch('showtoast', {message: 'Can\'t copy to clipboard. Permission denied', mode: 'error'});
                            });
                        } else {
                            $dispatch('showtoast', {message: 'Can\'t copy to clipboard. Permission denied', mode: 'error'});
                        }
                    });
                }
            },
            pasteFromClipboard(rindex = null, cindex = null) {
                navigator.permissions.query({ name: 'clipboard-read' }).then((result) => {
                    if (rindex == null || cindex == null) {
                        navigator.clipboard.readText()
                        .then(
                            (t) => {
                                this.listforsave = JSON.parse(t);
                                this.htmltext = JSON.stringify(this.listforsave);
                                $dispatch('showtoast', {message: 'Content pasted from clipboard', mode: 'success'});
                            }
                        ).catch(
                            (e) => {
                                console.log(e);
                            }
                        );
                    } else {
                        navigator.clipboard.readText()
                            .then(
                                (t) => {
                                    let oldClasses = JSON.parse(JSON.stringify(this.contentlist[rindex].cols[cindex].classes));
                                    let cbContent = JSON.parse(t);
                                    cbContent.classes = oldClasses;
                                    this.contentlist[rindex].cols[cindex] = JSON.parse(JSON.stringify(cbContent));
                                    $dispatch('showtoast', {message: 'Content pasted from clipboard', mode: 'success'});
                                }
                            ).catch((e) => {
                                consile.log(e);
                            });

                    }
                });
            }

        }"
        x-init="
            $nextTick(() => {
                if (document.getElementById(contentDataDivId) != null) {
                    let thedata = decodeHtml((document.getElementById(contentDataDivId)).value);
                    if(thedata.length > 2) {
                        console.log(`thedata: ${thedata}`);
                        thedata = thedata.substring(1,thedata.length-1);
                        console.log(`thedata: ${thedata}`);
                        listforsave = JSON.parse(thedata);
                        htmltext = JSON.stringify(listforsave);
                        if (listforsave.length > 0) {
                            contentlist = JSON.parse(JSON.stringify(listforsave));
                            getRenderedPreview();
                        }
                    }
                }
            });
        "
        @filechanged.window="
            updateFiledata($event.detail);
        "
        class="form-control">
        <input x-bind:id="contentDataDivId ?? ''" type="hidden" value="{{'"'.$contentdata.'"' ?? ''}}">
        <div class="w-full h-20 bg-base-100 rounded-md border border-base-content border-opacity-20 overflow-hidden relative">
            <div x-show="previewHtml.length > 0 " class="p-2 overflow-y-scroll bg-white text-black" x-html="previewHtml"></div>
            <button @click.prevent.stop="showEditor()" type="button" class="flex flex-row justify-center absolute right-1/2 top-1/4 z-20 btn btn-sm btn-warning">
            <x-easyadmin::display.icon icon="easyadmin::icons.edit" />
            <button @click.prevent.stop="copyToClipboard()" type="button" class="flex flex-row justify-center absolute right-1 top-1 z-20 btn btn-sm bg-darkgray">
                <x-easyadmin::display.icon icon="easyadmin::icons.copy-clipboard" />
            </button>
            <button @click.prevent.stop="pasteFromClipboard()" type="button" class="flex flex-row justify-center absolute right-1 bottom-1 z-20 btn btn-sm bg-darkgray">
                <x-easyadmin::display.icon icon="easyadmin::icons.paste-clipboard" />
            </button>
        </div>

        </button>
        <input name="{{$key}}" type="hidden" x-model="htmltext" class="textarea textarea-bordered h-24"/>
        <div x-show="editorVisible" class="fixed top-0 left-0 z-50 bg-base-200 bg-opacity-70 flex flex-col w-screen">
            <div class="w-5/6 mx-auto h-screen overflow-y-scroll bg-base-100">
                <div>
                    <x-inputs.builder-partials.preview />
                </div>
                <div class="w-full flex flex-col items-center p-4 relative">
                    {{-- <button @click.prevent.stop="showOptions();" type="button" class="mt-8 px-4 py-2 bg-base-100 rounded-md border border-base-content border-opacity-20 flex flex-row justify-center items-center">
                        Add Row&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.plus" />
                    </button> --}}
                    <div @click.outside="showRowOptions = false;" class="w-full flex flex-row justify-center">
                        <div class="bg-base-200 rounded-sm shadow-md p-4">
                            <div class="flex flex-row space-x-4 items-center">
                                <div>Add Row:</div>
                                <button type="button" @click.prevent.stop="addRow(['w-full'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    1 Col
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-1/2', 'w-1/2'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 1:1
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-1/3', 'w-2/3'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 1:2
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-2/3', 'w-1/3'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 2:1
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-2/5', 'w-3/5'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 2:3
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-3/5', 'w-2/5'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 3:2
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-1/3', 'w-1/3', 'w-1/3'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    3 Cols
                                </button>
                                <button type="button" @click.prevent.stop="addRow(['w-1/4', 'w-1/4', 'w-1/4', 'w-1/4'])" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    4 Cols
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-4 mt-4 border-t border-base-content border-opacity-20 w-full p-4">
                        <button @click.prevent.stop="hideEditor();" type="button" class="mt-2 px-4 py-2 bg-transparent text-error flex flex-row justify-center items-center">
                            Cancel&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.close" />
                        </button>
                        <button @click.prevent.stop="setContentForSave();hideEditor();" type="button" class="btn btn-success btn-sm text-white">
                            Set Content <x-easyadmin::display.icon icon="easyadmin::icons.tick" />
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
