<?php


it('should have the exact Form Request Class', function () {
    $this->assertActionUsesFormRequest(
        controller::class,
        'action',
        FormRequest::class
    );
});
