
@props(['count','text'])

<div x-data="{
        num: parseInt({{$count}}),
        count: parseInt({{$count}}),
        duration: 1000,
        stepDuration: Math.floor(20 + Math.random() * 30),
        interval: null,
        pulse: false,
        done: false,
        animate() {
            if (!this.done) {
                this.num = 0;
                this.interval = setInterval(() => {
                    this.num += Math.floor(((this.stepDuration/this.duration) * this.count));
                    if (this.num >= this.count) {
                        this.num = this.count;
                        clearInterval(this.interval);
                        this.interval = null;
                        this.pulse = true;
                        setTimeout(() => {
                            this.pulse = false;
                        }, 2000);
                        this.done = true;
                    }
                }, this.stepDuration);
            } else {
                this.pulse = true;
                setTimeout(() => {
                    this.pulse = false;
                }, 2000);
            }
        },
    }"
    @animatecounts.window="animate();"
    class="flex flex-col lg:space-y-3 justify-center w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:h-52 lg:w-52 border border-gray/30  bg-white  shadow-[1px_1px_3px_2px_rgba(0,0,0,0.3)] items-center js-watch-scroll">
    <img src="/images/icons/baby icon.png" class="h-12 md:h-14 lg:h-16 xl:20 2xl:h-20 mx-auto px-3" :class="!pulse || 'animate-pulse'" alt="">
    <p class="text-center text-xs lg:text-base xl:text-4xl" x-text="num"></p>
    <p class="text-center text-xs lg:text-base xl:text-lg text-darkgray ml-2 mr-2">{{$text}}</p>
</div>
