<div class="flex justify-center">
<div class="carousel  ">
  <div id="slide1" class="carousel-item relative w-full flex justify-center">
    <x-pink-card />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide9" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide2" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide2" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'ICSI'" :fullform="'(Intracytoplasmic Sperm Injection)'" :content="'A procedure where a single sperm is injected directly into an egg to assist with fertilization.'"/>
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide1" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide3" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide3" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'IUI'" :fullform="'(Intrauterine Insemination)'" :content="' A procedure where sperms are directly placed into the uterus to facilitate fertilization.'"/>
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide2" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide4" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide4" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'PGT '" :fullform="''" :content="'Pre-implantation Genetic Testing is a technique used to screem embryos for genetic abnomalities before implantation during in vitro fertilization (IVF)'"/>
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide3" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide5" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide5" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'LAPAROSCOPIC SURGERY'" :fullform="''" :content="'A minimally invasive surgical technique used to diagnose and treat various conditions, including infertility issues.'"/>
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide4" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide6" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide6" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'MICRO TESE'" :fullform="'Microsurgical Testicular Sperm Extraction:'" :content="'A procedure to retrieve sperm from the testicles for use in IVF or ICS'"/>
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide5" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide7" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide7" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'PEDIATRICS'" :fullform="''" :content="'A medical specially focused on the health and well-being of infants, children, and adolescents.'" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide6" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide8" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide8" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'NEONATOLOGY'" :fullform="''" :content="'A subspecialty of pediatrics that focuses on the medical care of newborn infants, especially those who are ill or premature.'" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide7" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide9" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
  <div id="slide9" class="carousel-item relative w-full flex justify-center">
  <x-pink-card :title="'Ovarian Rejuvenation Stem Cell Treatment'" :fullform="''" :content="'It involves injecting stem cells into the ovaries to potentially restore ovarian function and fertility.'" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-0 right-0 sm:left-5 sm:right-5 top-1/2">
      <a href="#slide8" class="btn btn-outline btn-circle h-3 w-12">❮</a> 
      <a href="#slide1" class="btn btn-outline btn-circle h-3 w-12">❯</a>
    </div>
  </div>
</div>
</div>
