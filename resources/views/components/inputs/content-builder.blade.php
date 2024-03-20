@props(['key'])
<div>
    <div x-data="{
            htmltext: '',
            contentlist: [],
            editorVisible: false,
            showEditor() {
                this.editorVisible = true;
            },
            hideEditor() {
                this.editorVisible = false;
            },
            addRow(nCols, ratio = null) {
                let cols = [];
                if (ratio == null) {
                    for (i = 0; i < cols; i++) {
                        cols.push([
                            {
                                type: ''
                            }
                        ]);
                    }
                }
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
                let str = '<div>';
                theitem.content.forEach((item) => {
                    let atrStart = item.attribs != null ? item.attribs.reduce((r, x) => {
                        return r + `<${x}>`;
                    }, '') : '';
                    let atrEnd = item.attribs != null ? item.attribs.reverse().reduce((r, x) => {
                        return r + `</${x}>`;
                    }, '') : '';
                    switch(item.type) {
                        case 'plaintext':
                            str += `<span>${atrStart}${item.text}${atrEnd}</span> `;
                            break;
                        case 'inlink':
                            str += `<a x-on:click.prevent.stop='' href='${item.link}'>${atrStart}${item.text}${atrEnd}</a> `;
                            break;
                        case 'exlink':
                            str += `<a href='${item.link}' target='_blank'>${atrStart}${item.text}${atrEnd}</a> `;
                            break;
                    }
                });
                str += '</div>';
                return str.trim();
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

            },
            moveCol(dir, row, col) {

            },
            moveColItem(dir, row, col, index) {

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
            }
        }"
        x-init="
            let col = {
                classes: ['w-1/3'],
                items: [
                    {
                        type: 'heading',
                        level: 1,
                        content: 'An awesome heading!'
                    },
                    {
                        type: 'img',
                        url: '/images/placeholder800x450.png',
                        ulid: '',
                        attribs: {
                            width: '',
                            height: '',
                            alt: ''
                        }
                    },
                    {
                        type: 'para',
                        content: [
                            {
                                type: 'plaintext',
                                text: 'some text kjh dak akdj akdhj akd akd akdjb',
                                attribs: ['i', 'u', 'b']
                            },
                            {
                                type: 'plaintext',
                                text: 'some normal text',
                                attribs: []
                            },
                            {
                                type: 'inlink',
                                text: 'inlink text',
                                link: '/some-link',
                                attribs: ['u']
                            },
                            {
                                type: 'exlink',
                                text: 'exlink text',
                                link: 'http://ynotzitsolutions.com',
                                attribs: ['b']
                            },
                        ]
                    },
                    {
                        type: 'list',
                        list: [
                            {
                                text: 'li 1',
                                attribs: ['b']
                            },
                            {
                                text: 'li 2',
                                attribs: ['i']
                            },
                            {
                                text: 'li 3',
                                attribs: ['u']
                            },
                        ],
                        listType: 'ol'
                    },
                ]
            };
            contentlist = [
                {
                    cols: [
                        col, col, col
                    ],
                    classes: []
                },
            ];

        "
        @filechanged.window="
            console.log('file change captured');
            updateFiledata($event.detail);
        "
        class="form-control">
        <button @click.prevent.stop="showEditor()" type="button" class="w-full py-10 bg-base-100 rounded-md border border-base-content border-opacity-20 flex flex-row justify-center">
            <x-easyadmin::display.icon icon="easyadmin::icons.plus" />
        </button>
        <input name="{{$key}}" type="hidden" model="htmltext" class="textarea textarea-bordered h-24"/>
        <div x-show="editorVisible" class="fixed top-0 left-0 z-50 bg-base-200 bg-opacity-70 flex flex-col w-screen">
            <div class="w-5/6 mx-auto h-screen overflow-y-scroll bg-base-100">
                <div>
                    <x-inputs.builder-partials.preview />
                </div>
                <div x-data="{
                        showRowOptions: false,
                        showOptions() {
                            this.showRowOptions = true;
                        },
                    }" class="w-full flex flex-col items-center p-4 relative">
                    <button @click.prevent.stop="showOptions();" type="button" class="mt-8 px-4 py-2 bg-base-100 rounded-md border border-base-content border-opacity-20 flex flex-row justify-center items-center">
                        Add Row&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.plus" />
                    </button>
                    <button @click.prevent.stop="hideEditor();" type="button" class="mt-2 px-4 py-2 bg-transparent text-error flex flex-row justify-center items-center">
                        Cancel&nbsp;<x-easyadmin::display.icon icon="easyadmin::icons.close" />
                    </button>
                    <div x-show="showRowOptions" class="absolute top-24 w-full flex flex-row justify-center">
                        <div class="bg-base-200 rounded-sm shadow-md p-4">
                            <div class="flex flex-row space-x-4">
                                <button type="button" @click.prevent.stop="addRow(1)" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    1 Col
                                </button>
                                <button type="button" @click.prevent.stop="addRow(2, '1x1')" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 1:1
                                </button>
                                <button type="button" @click.prevent.stop="addRow(2, '1x2')" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 1:2
                                </button>
                                <button type="button" @click.prevent.stop="addRow(2, '2x1')" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    2 Cols 2:1
                                </button>
                                <button type="button" @click.prevent.stop="addRow(3)" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    3 Cols
                                </button>
                                <button type="button" @click.prevent.stop="addRow(4)" class="px-2 py-1 btn btn-success bg-opacity-60 text-base-content">
                                    4 Cols
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
