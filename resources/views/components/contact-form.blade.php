<div x-data="{
    loading: false,
    successMessage: false,
    errorMessage: false,
    doSubmit(e) {
        let f = e.target;
        let fd = new FormData(f);
        this.loading = true;
        axios.post('{{route('mail.contact')}}', fd).then((r) => {
            console.log('mail response');
            console.log(r);
            this.loading = false;
            this.successMessage = true;
            document.getElementById('contact-form').reset();
        }).catch((e) => {
            this.loading = false;
            this.errorMessage = true;
        });
    }
}"  class="flex flex-col  border border-gray/25 bg-white shadow-xl p-10">
    <p class="text-xl font-franklin font-bold">{{__('contact.please_submit_form')}}</p>
    <form id="contact-form"  method="POST" action="" @submit.prevent.stop="doSubmit" class="relative">
        @csrf
        <div class="flex flex-col gap-8 mt-6 ">
            <div class="relative  ">
                <input id="name" name="name" type="text" autocomplete="name"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none border-b focus:border-0
                        border-black"
                    placeholder="Name" required/>
                <label for="name"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5 text-sm   transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">{{__('contact.name')}}
                </label>
            </div>
            <div class="relative  ">
                <input id="email" name="email" type="email" autocomplete="email"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none focus:border-0 border-b
                        border-black"
                    placeholder="Email" required />
                <label for="email"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">{{__('contact.email_contact')}}
                </label>
            </div>
            <div class="relative   ">
                <input id="message" name="message" type="text"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none focus:border-0 border-b
                        border-black"
                    placeholder="Mesage" required/>
                <label for="message"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5text-sm transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">{{__('contact.message')}}
                </label>
            </div>
            <div>
                <button type="submit" class="cursor-pointer text-sm  font-semibold  bg-gray font-franklin tracking-widest w-full p-2">{{__('contact.send')}}</button>
            </div>
        </div>
        <div x-show="loading" class="absolute w-full h-full top-0 left-0 bg-pink bg-opacity-90 flex justify-center items-center text-white">
            <div class="font-bold animate-pulse m-2 p-2">
                Please wait while we are submitting your message..
            </div>
        </div>
        <div x-show="successMessage" class="absolute w-full h-full top-0 left-0 bg-gray-600 bg-opacity-90 flex justify-center items-center text-white">
            <div class="font-bold m-2 p-2 text-center">
                Your message was submitted successfully. We will get back to you shortly.<br>Thank you!<br>
                <button type="button" @click="successMessage = false;" class="btn btn-success">Ok</button>
            </div>
        </div>
        <div x-show="errorMessage" class="absolute w-full h-full top-0 left-0 bg-gray-600 bg-opacity-90 flex justify-center items-center text-white">
            <div class="font-bold m-2 p-2 text-center">
                Sorry, your message couldn't be submitted due to some unexpected error. Please try again.<br>
                <button type="button" @click="errorMessage = false;" class="btn btn-warning">Ok</button>
            </div>
        </div>
    </form>
</div>
