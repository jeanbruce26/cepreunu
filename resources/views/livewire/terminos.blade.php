<div>
    <form wire:submit.prevent='terminos' method='post' novalidate>
        @csrf
        <div class="tab-content">
            <div class="tab-pane fade show active">
                <h5 class="card-header d-flex fw-bold justify-content-star align-items-center">Recomendación antes de comenzar su inscripción:</h5>
                <div class="card-body">
                    <h6 class="d-flex justify-content-star align-items-center">Por favor, lee determinadamente los siguientes puntos antes de comenzar con tu inscripción.</h6>

                    <table style="border-collapse:separate; border-spacing: 0 12px;">
                        <tbody>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-usd-circle"></td>
                                <td>
                                    <strong>Puedes realizar tu inscripción al día siguiente de haber realizado tu pago.</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-postcard"></i></td>
                                <td>
                                    <strong>Ten a mano tu Documento de Identidad.</strong> <br>
                                    La información solicitada debe ser escrita tal cual este en el.
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-info-circle"></i></td>
                                <td>
                                    <strong>Proporciona datos fidedignos (auténticos).</strong> <br>
                                    Recuerda que la información que proporciones sera derivada a la <strong>Oficina Central de Admisión</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-info-circle"></i></td>
                                <td>
                                    <strong>Si ya has estudiado en la CEPREUNU.</strong> <br>
                                    Al momento de proporcionar tu <strong>Documento de Identidad</strong> el Sistema de Matricula completará parcialmente tu <strong>Información Personal</strong> de manera automática. <br>
                                    Así mismo, si consideras que algo está desactualizado o erroneo, seras capaz de modificar dicha información.
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-camera"></i></td>
                                <td>
                                    <strong>Proporciona una fotografia estilo pasaporte (NO SELFIES).</strong> <br>
                                    Ya que, esta foto irá en los documentos generados por el sistema.
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-info-circle"></i></td>
                                <td>
                                    <strong>Se muy cuidadoso al completar cada información solicidad por el Sistema de Inscripción.</strong> <br>
                                    Ya que, la información proporcionada tiene caracter de <strong>Declaración Jurada.</strong>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex me-2"><i class="uil uil-info-circle"></i></td>
                                <td>
                                    <strong>De obtener una vacante en el presente proceso del CEPREUNU (2023 - II).</strong> <br>
                                    Dicha vacante sera para el Semestre Académico Universitario 2023 - I.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-text mt-2">
                        <input type="checkbox" wire:model="check" class="me-2  @error('check') is-invalid  @enderror">
                        <span class="fw-bold text-dark">Acepto Terminos y condiciones.</span>
                    
                        @error('check')
                            <span class="invalid-feedback ms-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> 
                </div>
                <div class="d-flex align-items-start gap-3 mt-4">
                    <button type="submit" class="btn btn-success btn-label right ms-auto"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Siguiente</button>
                </div>
            </div>
            <!-- end tab pane -->
        </div>
        <!-- end tab content -->
    </form>
</div>
