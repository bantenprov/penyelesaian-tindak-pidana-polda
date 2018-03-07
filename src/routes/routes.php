<?php

Route::group(['prefix' => 'api/tindak-pidana-polda', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@index',
        'create'    => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@create',
        'show'      => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@show',
        'store'     => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@store',
        'edit'      => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@edit',
        'update'    => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@update',
        'destroy'   => 'Bantenprov\TindakPidanaPolda\Http\Controllers\TindakPidanaPoldaController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('tindak-pidana-polda.index');
    Route::get('/create',       $controllers->create)->name('tindak-pidana-polda.create');
    Route::get('/{id}',         $controllers->show)->name('tindak-pidana-polda.show');
    Route::post('/',            $controllers->store)->name('tindak-pidana-polda.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('tindak-pidana-polda.edit');
    Route::put('/{id}',         $controllers->update)->name('tindak-pidana-polda.update');
    Route::delete('/{id}',      $controllers->destroy)->name('tindak-pidana-polda.destroy');
});
