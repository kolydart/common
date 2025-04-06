<?php

namespace Kolydart\Common;

/**
 * Presenter class for presenting data in views
 * 
 * This class serves as a migration path from gateweb\common\Presenter
 * with maintained backward compatibility
 * 
 * @deprecated This class is deprecated and will be removed in future versions. 
 * Use \Kolydart\Common\ViewHelper instead.
 */
class Presenter {

    /**
     * Generate a Bootstrap modal for confirming deletions
     *
     * @param  string|null $id Optional identifier to support multiple modals on the same page
     * @param  string|null $message Custom confirmation message 
     * @return string HTML for the confirmation modal
     * 
     * @example
     * <form action="{{ route('items.destroy', $item) }}" method="POST" class="form-inline" role="form">
     *    @csrf
     *    @method('DELETE')
     *    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete{{ $item->id }}">
     *        <i class="fa fa-trash"></i> Delete
     *    </button>
     *    {!! \Kolydart\Common\Presenter::confirm_delete_modal($item->id) !!}
     * </form>
     * 
     * @deprecated Use \Kolydart\Common\ViewHelper::confirm_delete_modal() instead.
     */
    public static function confirm_delete_modal($id = null, $message = null) {
        return ViewHelper::confirm_delete_modal($id, $message);
    }
    
    /**
     * Proxy for calling methods on ViewHelper
     *
     * @param string $name Method name
     * @param array $arguments Method arguments
     * @return mixed Result from ViewHelper method
     * @throws \BadMethodCallException If method doesn't exist on ViewHelper
     */
    public static function __callStatic($name, $arguments) {
        if (method_exists(ViewHelper::class, $name)) {
            trigger_error(
                sprintf('Method %s::%s() is deprecated, use %s::%s() instead', 
                    self::class, $name, ViewHelper::class, $name), 
                E_USER_DEPRECATED
            );
            return ViewHelper::$name(...$arguments);
        }
        
        throw new \BadMethodCallException(
            sprintf('Method %s::%s() does not exist', ViewHelper::class, $name)
        );
    }
}