@extends('layout')
@section('content')
<div class="relative w-full overflow-hidden min-h-screen flex justify-center">
    <div class="relative w-full max-w-7xl mx-auto flex">
        <!-- Background image -->
        <div class="absolute left-0 top-0 h-auto w-full md:w-1/2">
            <img src="{{ asset('images/about/product-logo-philosophy.png') }}" alt="Logo Philosophy"
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
                            <div class="flex items-center justify-center mb-3 md:mb-4 relative">
                                <div class="text-center">
                                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Product Logo Philosophy</h1>
                                    <div class="w-20 md:w-24 h-1 bg-gradient-to-r from-blue-500 to-red-500 mx-auto mb-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content section -->
                    <div class="px-4 py-1 md:px-8 md:py-1 overflow-y-auto h-[calc(100vh-140px)] md:h-auto">
                        <div class="max-w-4xl mx-auto space-y-6 md:space-y-8">                          
                            <!-- Product Logo Philosophy -->
                            <div class="bg-white/70 backdrop-blur-sm rounded-lg p-4 md:p-6 shadow-md">
                                <div class="flex justify-center mb-4 md:mb-6">
                                    <div class="w-24 md:w-32 h-16 md:h-24">
                                        <img src="{{ asset('images/logo.png') }}" alt="Product Logo" class="h-full w-full object-contain">
                                    </div>
                                </div>
                                
                                <p class="text-sm text-gray-700 mb-4 md:mb-6 leading-relaxed">
                                    The logo of <strong>PINus Software</strong> reflects the company's product identity as a technology solutions provider that is innovative, professional, and service-oriented. Each element within the design carries thoughtful meaning:
                                </p>
                                
                                <div class="space-y-3 md:space-y-4">
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Abstract Pine Tree Symbol (Top of Logo).</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">The graphic shape resembling a pine tree is constructed from red and blue wave-like dots, symbolizing growth, resilience, and structured systems, just like the real pine tree known for its endurance. The interconnected waves represent data flow, system integration, and seamless connectivity, essential for modern digital environments.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Wave-like Pattern.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Suggests dynamic movement, adaptability, and forward momentum representing the seamless flow of services, care, and the company's commitment to helping clients grow and succeed. These waves also reflect human-centric values, where technology is built to save and empower people, communities, and communities.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• Red and Blue Color Scheme.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">Red symbolizes passion, energy, and boldness, expressing the company's drive to deliver impactful and innovative solutions. Blue represents trust, professionalism, stability, and technology, underscoring PINus Software's role as a dependable digital partner.</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-semibold text-gray-800 mb-2 text-sm md:text-base">• "PINus" Text & SOFTWARE Typography.</h3>
                                        <p class="text-xs md:text-sm text-gray-700 ml-3 md:ml-4 leading-relaxed">"PINus" stands for Performa Inti Nusantara, prominently displayed in bold and contrasting colors to emphasize the company's core identity, innovation, reliability, and high performance. Software typography placed neatly below the main name, it clearly communicates the company's focus in software development and IT consultancy services.</p>
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