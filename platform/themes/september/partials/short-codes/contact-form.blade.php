<div class="block--contact-info">
    <div class="block__info" style="padding: 0;">
        <h3>{{ theme_option('site_title') }}</h3>
        <p><strong>{{ __('Address') }}:</strong> {{ theme_option('address') }}</p>
        <p><strong>{{ __('Hotline') }}:</strong> {{ theme_option('hotline') }}</p>
    </div>
</div>

{!!
    $form
        ->setFormOption('class', 'form--contact contact-form')
        ->setFormInputClass('form-control')
        ->add('helper_text', 'html', ['html' => '<p>' . BaseHelper::clean(__('The field with (<span style="color:#FF0000;">*</span>) is required.')) . '</p>'])
        ->modify(
                'submit',
                'submit',
                Botble\Base\Forms\FieldOptions\ButtonFieldOption::make()
                    ->cssClass('btn--custom btn--outline btn--rounded')
                    ->label(__('Send'))
                    ->wrapperAttributes(['class' => 'form__submit'])
                    ->toArray(),
                true
            )
        ->renderForm()
!!}
