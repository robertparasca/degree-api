<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $controllerPath = $this->routeResolver->call($this)->action['controller'];
        $controllerNameAndMethod = array_reverse(explode('\\', $controllerPath))[0];
        $controllerName = explode('@', $controllerNameAndMethod)[0];
        $methodName = explode('@', $controllerNameAndMethod)[1];
        $userPermissions = $this->user()->permissions->pluck('name')->toArray();
        $neededPermission = $controllerName . '_' . $methodName;
        return in_array($neededPermission, $userPermissions);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
