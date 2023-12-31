<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, Throwable $e)
    {
        if ($request->ajax()) {

            if ($e instanceof ValidationException) {
                return $this->convertValidationExceptionToResponse($e, $request);
            }
            if ($e instanceof ModelNotFoundException) {
                $modelo = strtolower(class_basename($e->getModel()));
                return $this->errorResponse("No existe ninguna instancia de {$modelo} con el id especificado", 404);
            }

            if ($e instanceof AuthenticationException) {
                return $this->unauthenticated($request, $e);
            }

            if ($e instanceof AuthorizationException) {
                return $this->errorResponse('No posee permisos para ejecutar esta acción', 403);
            }

            if ($e instanceof NotFoundHttpException) {
                return $this->errorResponse('No se encontró la URL especificada', 404);
            }

            if ($e instanceof MethodNotAllowedHttpException) {
                return $this->errorResponse('El método especificado en la petición no es válido', 405);
            }

            if ($e instanceof HttpException) {
                return $this->errorResponse($e->getMessage(), $e->getStatusCode());
            }

            if ($e instanceof QueryException) {
                $codigo = $e->errorInfo[1];
                if ($codigo == 1451) {
                    return $this->errorResponse('No se puede eliminar de forma permanente el recurso porque está relacionado con algún otro.', 409);
                }
            }

            if (config('app.debug')) {
                return parent::render($request, $e); // TODO: Change the autogenerated stub
            }

            return $this->errorResponse('Falla inesperada. Intente luego.', 500);
        }


        return parent::render($request, $e);
    }
}
