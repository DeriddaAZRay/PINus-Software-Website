@extends('layout')
@section('content')
<div class="relative w-full overflow-hidden min-h-screen flex justify-center">
    <div class="relative w-full max-w-7xl mx-auto flex">
        <!-- Background image -->
        <div class="absolute left-0 top-0 h-auto w-full md:w-1/2">
            <img src="{{ asset('images/about/company-logo-philosophy.png') }}" alt="Logo Philosophy"
                class="w-full object-contain md:object-left object-top">
            <!-- Mobile overlay -->
            <div class="absolute inset-0 bg-black/15 md:bg-transparent"></div>
        </div>
        
        <div class="relative min-h-screen flex items-center w-full">
            <div class="w-full md:ml-auto md:w-1/2 bg-white/10 backdrop-blur-md border border-white/30 shadow-lg min-h-screen md:min-h-auto">
                <div class="relative z-10 bg-gradient-to-b md:bg-gradient-to-r from-white/80 md:from-white/60 via-white/70 md:via-white/40 to-white/60 md:to-white/20 backdrop-blur-sm h-full">
                    <!-- Header -->
                    <div class="py-1 md:py-1 pt-2 md:pt-8 relative overflow-hidden">
                        <div class="container mx-auto relative z-10 px-4 md:px-0">
                            <div class="flex items-center justify-center relative">
                                <div class="text-center">
                                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Company Logo Philosophy</h1>
                                    <div class="w-20 md:w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="px-4 py-1 md:px-8 md:py-2 overflow-y-auto h-[calc(100vh-140px)] md:h-auto">
                        <div class="max-w-4xl mx-auto space-y-6 md:space-y-8">
                            
                            <!-- Company Logo Philosophy -->
                            <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 md:p-6 shadow-md">
                                <div class="flex justify-center mb-4 md:mb-6">
                                    <div class="w-48 md:w-64 h-16 md:h-24">
                                        <img src="{{ asset('images/logo-footer.png') }}" alt="Company Logo" class="h-full w-full object-contain">
                                    </div>
                                </div>
                                <p class="text-sm text-gray-700 mb-4 md:mb-6 leading-relaxed">
                                    The logo of <strong>PT Performa Inti Nusantara</strong> represents the company's commitment to being a trusted software house and IT consultant, offering collaboration and technology-driven solutions that continually evolve to address digital challenges and Provide Better Performance.
                                </p>
                                
                                <div class="space-y-3 md:space-y-4">
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Hexagon Shape.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Symbolizes strength, structure, and efficiency, qualities commonly found in both technology and nature (e.g., honeycomb). In design, stability, and system integrity. The hexagon shape, aesthetic qualities, alongside business success indicator. PINus innovative and collaborative aspects.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Supporting Hands (Top and Bottom).</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">represent trust, collaboration, and service. The upper hand symbolizes PINus as a provider of solutions and support, while the lower hand represents clients receiving services from PINus. Together, they reflect a professional and human-centered commitment to partnership and service excellence.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Blue Dots on Both Sides.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Indicate connectivity and represent technology and humanity. They highlight the company's focus not only on technological innovation but also on human relationships with clients and communities alike.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• "PINus" Inside the Hexagon.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">"PINus" at the center reinforces the company's mission. The unique and memorable name represents our values: innovation, reliability, and high performance.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• "PROVIDE BETTER PERFORMANCE" Tagline.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Emphasizes the company's mission to deliver superior performance and results across all services and operations.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Red and Blue Color Scheme.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Red signifies passion, energy, and determination used in the tagline and service focus areas to highlight strength. Blue conveys trust, professionalism, and technology seen in the outline and lines, representing modernity and reliability. Gray used in the company name underlines professionalism and maturity.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection