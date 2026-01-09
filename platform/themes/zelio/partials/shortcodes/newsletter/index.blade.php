@php
    $title = $shortcode->title;
    $subtitle = $shortcode->subtitle;
    $description = $shortcode->description;
    $buttonLabel = $shortcode->button_label ?: __('Subscribe');
@endphp

<section class="section-newsletter bg-900 position-relative overflow-hidden">
    <div class="container position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="text-start">
                    @if ($subtitle)
                        <div class="d-inline-flex align-items-center rounded-pill newsletter-badge mb-3">
                            <span class="text-light fw-bold text-uppercase">{{ $subtitle }}</span>
                        </div>
                    @endif

                    @if ($title)
                        <h3 class="ds-3 mt-3 mb-0">{!! BaseHelper::clean($title) !!}</h3>
                    @endif
                </div>
            </div>

            <div class="col-lg-7">
                <div class="text-start">
                    @if ($description)
                        <p class="fs-5 fw-medium text-200 mb-4">{!! nl2br(e($description)) !!}</p>
                    @endif

                    <div class="newsletter-form-wrapper">
                        <div class="newsletter-input-container position-relative">
                            <span class="icon-input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </span>
                            {!!
                                $form
                                    ->formClass('form-newsletter')
                                    ->setFormInputWrapperClass('newsletter-input-wrapper mb-0')
                                    ->setFormInputClass('form-control newsletter-input')
                                    ->setFormLabelClass('d-none')
                                    ->remove('submit')
                                    ->add(
                                        'submit',
                                        'submit',
                                        \Botble\Base\Forms\FieldOptions\ButtonFieldOption::make()
                                            ->wrapperAttributes(['class' => 'newsletter-btn-wrapper mb-0'])
                                            ->cssClass('btn btn-gradient')
                                            ->label(e($buttonLabel))
                                    )
                                    ->renderForm()
                            !!}
                        </div>
                    </div>

                    <div class="newsletter-message newsletter-success-message text-success mt-3" style="display: none"></div>
                    <div class="newsletter-message newsletter-error-message text-danger mt-3" style="display: none"></div>
                </div>
            </div>
        </div>
    </div>
</section>
