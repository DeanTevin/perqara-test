<?php

use App\Containers\AppSection\LoggingService\UI\WEB\Controllers\AuditController;
use App\Containers\AppSection\LoggingService\UI\WEB\Controllers\LogViewerController;
use Illuminate\Support\Facades\Route;

/**
 * Logging Services are Provided using this Package:
 * 
 * rap2hpoutre/laravel-log-viewer
 * 
 */
if(config('appSection-loggingService.logviewer_enabled') == true){
    Route::get(config('appSection-loggingService.logviewer_route'), [LogViewerController::class, 'index'])->middleware(['auth:web','role:admin'])->name('logging-service');
}

/**
 * Audit Viewer are Provided using this Package:
 * 
 * sunshift/laravel-audit-viewer
 * 
 */
if(config('audit.audit_viewer.enabled') == true){
    Route::get(config('audit.audit_viewer.routes'), [AuditController::class, 'index'])->name('audits');
}

//Deprecated 27-12-2023 By Deant
//without AUTH 
// Route::get('bypass/logging-services', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);