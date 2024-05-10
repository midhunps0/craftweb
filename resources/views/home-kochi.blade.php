<!DOCTYPE html>
<html dir=ltr lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
    @stack('header_js')
</head>
<body class=" max-w-[1500px] m-auto font-franklin">
<div class="bg-white">
    <div class=" ">
        
        <x-top-image/>
    </div>
    <div id="section1" class="mt-6 max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto">
        <p class="text-darkgray text-center  text-xl lg:text-4xl mt-32">Treatments We Offer</p>
        <div class="lg:flex flex-col gap-6 mt-6 hidden">
        <div class="flex flex-row justify-center gap-6 ">
        <x-pink-card />
        <x-pink-card :title="'ICSI'" :fullform="'(Intracytoplasmic Sperm Injection)'" :content="'A procedure where a single sperm is injected directly into an egg to assist with fertilization.'"/>
        <x-pink-card :title="'IUI'" :fullform="'(Intrauterine Insemination)'" :content="' A procedure where sperms are directly placed into the uterus to facilitate fertilization.'"/>
        </div>
        <div class="flex flex-row justify-center gap-6">
        <x-pink-card :title="'PGT '" :fullform="''" :content="'Pre-implantation Genetic Testing is a technique used to screem embryos for genetic abnomalities before implantation during in vitro fertilization (IVF)'"/>
        <x-pink-card :title="'LAPAROSCOPIC SURGERY'" :fullform="''" :content="'A minimally invasive surgical technique used to diagnose and treat various conditions, including infertility issues.'"/>
        <x-pink-card :title="'MICRO TESE'" :fullform="'Microsurgical Testicular Sperm Extraction:'" :content="'A procedure to retrieve sperm from the testicles for use in IVF or ICS'"/>
        </div>
        <div class="flex flex-row justify-center gap-6">
        <x-pink-card :title="'PEDIATRICS'" :fullform="''" :content="'A medical specially focused on the health and well-being of infants, children, and adolescents.'" />
        <x-pink-card :title="'NEONATOLOGY'" :fullform="''" :content="'A subspecialty of pediatrics that focuses on the medical care of newborn infants, especially those who are ill or premature.'" />
        <x-pink-card :title="'Ovarian Rejuvenation Stem Cell Treatment'" :fullform="''" :content="'It involves injecting stem cells into the ovaries to potentially restore ovarian function and fertility.'" />
        </div>
        </div>
        <div class="lg:hidden">
            <x-carousel-card/>
        </div>
    </div>
    <div id="section2" class="max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto">
        <x-legacy />
    </div>
    <p id="section3" class="text-darkgray text-center  text-xl sm:text-2xl lg:text-4xl mt-32">Our Experts</p>
    <div class="flex flex-col gap-y-8 lg:flex-row mt-6 gap-x-2 p-4 max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto">
        
    <x-expert
            :content="'Dr. C Mohammed Ashraf, a distinguished Gynecologist, Fertility Specialist, and Endoscopic Surgeon, possesses over 25 years of expertise in healthcare. Leading super specialty healthcare institutions across India and the Middle-East under the Craft banner, Dr. Ashraf&apos;s contributions to the field are exemplary.
            His extensive education and training, both domestically and internationally, reflect his commitment to excellence. As a member of prestigious medical societies such as the International Society for Reproductive Medicine and the American Association of Gynec Laparoscopists, Dr. Ashraf is deeply engaged in advancing medical knowledge and practices.
            Recognized for his outstanding contributions, Dr. Ashraf has been honored with various awards, including the &quot;International Young Scientist Award&quot; and the &quot;Gandhian Sevana Puraskaram.&quot; His leadership extends beyond clinical practice as he heads the renowned CRAFT Academy, a hub for ART and embryology training.
            Dr. Ashraf&apos;s advocacy for ethical and quality standards in infertility treatment, alongside his dedication to research and development, underscores his commitment to patient care. Engaging in Corporate Social Responsibility and philanthropic initiatives, he demonstrates a holistic approach to healthcare.
            At CRAFT, comprehensive Infertility Management services, including Reproductive Medicine and Surgery, Embryology, Sexology and Andrology, Genetics-PGD, and Neo-Natology, are offered under Dr. Ashraf&apos;s guidance, making it a preferred destination for individuals seeking infertility treatment.'"/>
    <x-expert  src="{{url('/images/noushinashraf.png')}}" :name="'Dr. Noushin Ashraf'" :qualification="'MD, FRM, MRCOG (UK), MRCP (IE) '" :designation="'Sr. Consultant in Reproductive Medicine'"
            :content="'Dr. Noushin, a leading Fertility Consultant, emphasizes individualized treatment protocols and empathy towards her patients. She has several national and inter- national publications and awards to her credit.Additionally, she serves on the Indian Editorial Advisory Board of ACOG and ESHRE. Inspired by her father, Dr. Mohammed Ashraf, Dr. Noushin excels academically, having obtained MRCOG from the Royal College of the UK and MRCP from the Royal College of Ireland, alongside an MD in Obstetrics and Gynecology from Dr. MGR Medical University, India. She is driven by her passion for helping childless couples and emphasizes an honest doctor-patient relations- hip for successful pregnancies.'"/>
    
    </div>
    <div class="mt-4 flex flex-col gap-6 lg:gap-x-12 lg:flex-row justify-center max-w-sm sm:max-w-lg md:max-w-2xl lg:max-w-4xl xl:max-w-6xl mx-auto p-10">
        <div id="section4" class="lg:w-1/2">
        <x-contact-form />
        </div>
        <div  class="">
            <x-address-kochi />
        </div>
        
    </div>
    <div class="relative w-full z-0 h-0 overflow-visible">
            <x-footer />
    </div>
   
</div>
   
      
</body>
</html>