<?php

namespace Kolydart\Common;

/**
 * ViewHelper class for presenting data in views
 * 
 * This class replaces the functionality previously in the Presenter class
 */
class ViewHelper {

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
     *    {!! \Kolydart\Common\ViewHelper::confirm_delete_modal($item->id) !!}
     * </form>
     */
    public static function confirm_delete_modal($id = null, $message = null) {
        $message = $message ?? 'Are you sure you want to delete this object?';

        return <<<HTML
            <div class="modal fade" id="confirm-delete{$id}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-danger"><strong>Delete</strong></h2>
                        </div>
                        <div class="modal-body">
                            <p>{$message}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-ok"><i class="fa fa-trash"></i> Delete</button>
                            <a class="btn btn-link" data-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
HTML;
    }
} 