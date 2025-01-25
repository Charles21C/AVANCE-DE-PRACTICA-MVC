@extends('layouts.master')

@section('title', 'Bienvenido al Sistema de Gestión Hospitalaria - SIGH')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <div class="bg-image" style="background-image: url('https://ghc.com.mx/wp-content/uploads/2022/12/bigstock-world-health-day-global-healt-412292590-1600x800.jpeg'); height: 100vh; background-size: cover; background-position: center; color: white; position: relative;">
        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6);"></div>
        <div class="container text-center text-light d-flex flex-column justify-content-center" style="height: 100%; z-index: 2; position: relative;">
            <h1 class="display-3 font-weight-bold mb-3" style="text-shadow: 2px 2px 5px rgba(0,0,0,0.7);">Bienvenido al Sistema Integral de Gestión Hospitalaria "SIGH"</h1>
            <h2 style="text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">Hospital Isidro Ayora</h2>
            <div class="button-container">
                <a href="#about" class="btn btn-gradient btn-sm mt-3">Conoce Más</a>
                <a href="/login" class="btn btn-outline-light btn-lg mt-3">Ingresar al Sistema</a>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="py-5" style="background-color: #f7f7f7; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
        <div class="container">
            <h2 class="text-center mb-4">Historia del Hospital Isidro Ayora</h2>
            <p class="text-justify">
                El Hospital Isidro Ayora de Loja es una entidad pública del Ministerio de Salud que inició sus actividades en agosto de 1979. 
                La historia del hospital Isidro Ayora de Loja se remonta a 1790, cuando el Cabildo de Loja fue el primer patrono. 
                En 1822, Simón Bolívar ordenó la rehabilitación del centro asistencial. 
                La construcción del hospital Isidro Ayora se concretó tras una huelga hospitalaria en 1968, en la que se exigía la construcción de un nuevo hospital.
            </p>
        </div>
    </section>

<section id="mission-vision" class="bg-light py-5" style="box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
    <div class="container">
        <div class="row justify-content-center">
           
            <div class="col-md-5 mb-4">
                <div class="card text-justify shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <i class="bi bi-flag fa-3x mb-3" style="color: #32CD32;"></i>
                        <h4 class="card-title">Misión</h4>
                        <p class="card-text">
                            Ofrecer servicios de excelencia en el campo médico, con la más avanzada tecnología, para lograr la satisfacción total de nuestros clientes.
                        </p>
                    </div>
                </div>
            </div>

           
            <div class="col-md-5 mb-4">
                <div class="card text-justify shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <i class="bi bi-eye fa-3x mb-3" style="color: #1E90FF;"></i>
                        <h4 class="card-title">Visión</h4>
                        <p class="card-text">
                            Ser una institución conocida y respetada por su compromiso continuo con la excelencia.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <!-- Principios Card -->
            <div class="col-md-5 mb-4">
                <div class="card text-justify shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <i class="bi bi-heart fa-3x mb-3" style="color:rgb(199, 194, 193);"></i>
                        <h4 class="card-title">Principios</h4>
                        <ul class="list-unstyled">
                            <li>-Compromiso con la vida y la salud.</li>
                            <li>-Respeto y dignidad para cada paciente.</li>
                            <li>-Innovación y desarrollo continuo.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Objetivos Card -->
            <div class="col-md-5 mb-4">
                <div class="card text-justify shadow-sm" style="border-radius: 10px; border: 1px solid #ddd;">
                    <div class="card-body">
                        <i class="bi bi-flag-checkered fa-3x mb-3" style="color: #FFD700;"></i>
                        <h4 class="card-title">Objetivos</h4>
                        <ul class="list-unstyled">
                            <li>-Servir a nuestros clientes con honestidad, integridad y calor humano. </li>
                            <li>-Ofrecer servicios de excelencia, de forma rápida y eficiente. </li>
                            <li>-Trabajar en equipo, con entusiasmo y dedicación.</li>
                            <li>-Dar siempre el máximo para cumplir nuestro compromiso con la excelencia.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- News Section (Carrusel) -->
<section id="news" class="py-5" style="background-color:rgb(255, 250, 250);">
    <div class="container">
        <h2 class="text-center mb-4">Noticias de Interés</h2>
        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://www.ambulanciascivera.com/wp-content/uploads/2018/09/ambulancia-colectiva-1.jpg" class="card-img-top news-img" alt="Noticia 1">
                                <div class="card-body">
                                    <h5 class="card-title">Nueva Unidad de Emergencias</h5>
                                    <p class="card-text">El hospital inaugura una moderna unidad de emergencias equipada con tecnología de última generación.</p>
                                    <a href="noticia1.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://www.phmk.es/img_noticias/2020/05/FOTO1407.jpg" class="card-img-top news-img" alt="Noticia 2">
                                <div class="card-body">
                                    <h5 class="card-title">Avances en Tecnología Médica</h5>
                                    <p class="card-text">Los avances en tecnología médica han mejorado la atención al paciente, con nuevas herramientas diagnósticas.</p>
                                    <a href="noticia2.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://www.salud.gob.ec/wp-content/uploads/2023/07/VAcuna-bivalente.jpg" class="card-img-top news-img" alt="Noticia 3">
                                <div class="card-body">
                                    <h5 class="card-title">Campaña de Vacunación Masiva</h5>
                                    <p class="card-text">El hospital organiza una campaña de vacunación masiva para prevenir enfermedades comunes en la región.</p>
                                    <a href="noticia3.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://cdn.www.gob.pe/uploads/document/file/694741/Foto.jpg" class="card-img-top news-img" alt="Noticia 4">
                                <div class="card-body">
                                    <h5 class="card-title">Reforzamiento de Protocolos Sanitarios</h5>
                                    <p class="card-text">El hospital implementa nuevos protocolos sanitarios para garantizar la seguridad y bienestar de los pacientes.</p>
                                    <a href="noticia4.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://noticias.upc.edu.pe/wp-content/uploads/2019/10/Campa%C3%B1a-de-sangre.jpg" class="card-img-top news-img" alt="Noticia 5">
                                <div class="card-body">
                                    <h5 class="card-title">Nueva Campaña de Donación</h5>
                                    <p class="card-text">El hospital organiza una nueva campaña de donación de sangre para abastecer los bancos de sangre locales.</p>
                                    <a href="noticia5.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="https://www.hpshospitales.com/wp-content/uploads/2018/10/CDR-7022-1.jpg" class="card-img-top news-img" alt="Noticia 6">
                                <div class="card-body">
                                    <h5 class="card-title">Taller de Primeros Auxilios</h5>
                                    <p class="card-text">El hospital organiza un taller gratuito sobre primeros auxilios para la comunidad local.</p>
                                    <a href="noticia6.html" class="btn btn-gradient" target="_blank">Leer Más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


    <!-- Contact Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contáctanos</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>Información de Contacto</h4>
                    <p><strong>Dirección:</strong> 2Q4V+HGP, Ciudad de Loja</p>
                    <p><strong>Teléfono:</strong> (07) 257-0540</p>
                    <p><strong>Email:</strong> cjcuenca6@utpl.edu.ec</p>
                </div>
                <div class="col-md-6">
                    <h4>Envíanos tus sugerencias</h4>
                    <form method="POST" action="/send-email">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Mensaje</label>
                            <textarea id="message" name="message" class="form-control" rows="4" placeholder="Escribe tu mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="downloads" class="py-5" style="background-color: #f1f1f1;">
        <div class="container">
            <h2 class="text-center mb-4">Descargas</h2>
            <p class="text-center">Descarga aquí la Ley de Salud:</p>
            <div class="text-center">
                <a href="https://www.salud.gob.ec/wp-content/uploads/2017/03/LEY-ORG%C3%81NICA-DE-SALUD4.pdf" class="btn btn-gradient" download>Descargar Ley de Salud</a>
            </div>
        </div>
    </section>

@endsection

@push('styles')
<style>
    .btn-gradient {
        background: linear-gradient(90deg, #32CD32, #1E90FF);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-gradient:hover {
        background: linear-gradient(90deg, #1E90FF, #32CD32);
        color: white;
    }

    .news-img {
        transition: transform 0.3s ease;
    }

    .news-img:hover {
        transform: scale(1.1);
    }

    .carousel-item img {
        width: 100%;
        height: auto;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: #1E90FF;
    }

    .carousel-control-prev, .carousel-control-next {
        filter: invert(100%);
    }
</style>

<style>
    
    /* Barra de navegación oculta en la página principal */
    .navbar {
        display: none !important;
    }
</style>

@endpush
