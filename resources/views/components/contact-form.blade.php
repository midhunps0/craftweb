<div class="flex flex-col  ">
    <p class="text-xl font-franklin font-bold">Contact Us</p>
    <p class="text-sm font-franklin ">Feel free to contact us any time. We will get back to you as we can!</p>
    <form  method="POST" action="">
    @csrf
        <div class="flex flex-col gap-8 mt-6 ">
            <div class="relative  ">
                <input id="name" name="name" type="text" autocomplete="name"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none border-b focus:border-0 
                        border-black"
                    placeholder="Name" required/>
                <label for="name"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5 text-sm   transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base 
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">Name
                </label>
            </div>
            <div class="relative  ">
                <input id="email" name="email" type="email" autocomplete="email"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none focus:border-0 border-b
                        border-black"
                    placeholder="Email" required />
                <label for="email"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5 text-sm transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base 
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">Email
                </label>
            </div>
            <div class="relative   ">
                <input id="message" name="message" type="text"
                    class="w-full h-10 text-gray-900 placeholder-transparent border-0  peer focus:outline-none focus:border-0 border-b
                        border-black"
                    placeholder="Mesage" required/>
                <label for="message"
                    class="absolute ltr:left-0 rtl:right-0 -top-3.5text-sm transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:md:text-base 
                        peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-black peer-focus:text-sm font-franklin">Message
                </label>
            </div>
            <div>
                <button type="submit" class="cursor-pointer text-sm  font-semibold  bg-gray font-franklin tracking-widest w-full p-2">SEND</button>
            </div>
        </div>
        
    </form>
</div>
