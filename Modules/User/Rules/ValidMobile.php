<?php

namespace Modules\User\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidMobile implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^9[0-9]{9}$/', $value)) {
            $fail('فرمت موبایل نامعتبر است. شماره موبایل باید با 9 شروع بشود و بدون فاصله وارد شود.');
        }    }

}
