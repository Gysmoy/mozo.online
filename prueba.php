<?php

$datos_post = json_encode(
    array(
        'applicationCode' => 'AUTOMOVILES',
        'tipoDocumento' => 'DNI',
        'codigoDocumento' => '72941485',
        'codigoCompania' => '1'
    )
);

$opciones = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => [
            'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJVc2VyVHlwZSI6IjMiLCJVc2VyU3ViVHlwZSI6IjMiLCJMb2dpblVzZXJOYW1lIjoiNDA2NDAxNjkiLCJVc2VyTmFtZSI6IkxJTFkgT0xJVkFSRVMgSEVSUkVSQSIsIkNsaWVudFByb2ZpbGUiOiIwIiwiVXNlclByb2ZpbGUiOiIiLCJBZ2VudE5hbWUiOiJHRVJFTkNJQSBERSBSSUVTR09TIEFTRVMgWSBDIiwiQWdlbnRJRCI6Ijg3MCIsIkRvY3VtZW50TnVtYmVyIjoiNDA2NDAxNjkiLCJSdWNOdW1iZXIiOiIyMDI1ODM0MjI0MSIsIlVzZXJFbWFpbCI6IkxPTElWQVJFU0BHRVJFTkNJQURFUklFU0dPUy5DT00iLCJUb2tlbk1hcGZyZSI6IiIsIlJvbGVDb2RlIjoiQ09SUkVET1IiLCJSb2xlTmFtZSI6IkNPUlJFRE9SIC0gIiwiT2ZmaWNlQ29kZSI6IjAiLCJVcmxSZWRpcmVjdCI6Imh0dHBzOi8vb2ltLm1hcGZyZS5jb20ucGUvT0lNQ09SUi9JbmljaW9Db3JyLmFzcHg_cGFyYW0xPTQwNjQwMTY5XHUwMDI2cGFyYW0yPUROSVx1MDAyNnBhcmFtMz3CrsODbsOTwq_DlVPDrcOrw45cdTAwMjZwYXJhbTQ9MCIsIkZsYWdVc2VyQnlQYXNzIjoiUyIsIklDb2RlTXgiOiIiLCJEb2N1bWVudFR5cGUiOiJETkkiLCJQZXJmaWxJZCI6IiIsIkdlc3RvcklkIjoiMCIsIkdlc3Rvck5hbWUiOiIiLCJQZXJzb25JZCI6IjU2NzQwIiwiVXNlcklkIjoiMzI0NjYiLCJDb21wYW55SWQiOiI1MTA5IiwiQ29tcGFueU5hbWUiOiJHRVJFTkNJQSBERSBSSUVTR09TIEFTRVMgWSBDIiwiVXNlckFkbWluUmVndWxhciI6IlUiLCJJc0F1dG9TZXJ2aWNlIjoiRmFsc2UiLCJMb2dpbkRhdGUiOiI2Mzc2NjA4MjE4ODAwMDAwMDAiLCJJc0VuY3J5cHQiOiJUcnVlIiwiaXNzIjoiaHR0cDovL2p3dGF1dGh6c3J2LmF6dXJld2Vic2l0ZXMubmV0IiwiYXVkIjoiMDk5MTUzYzI2MjUxNDliYzhlY2IzZTg1ZTAzZjAwMjIiLCJleHAiOjE2MzA1ODk3ODgsIm5iZiI6MTYzMDUwMzM4OH0.Zpydxi5bW6xRnY9I_fePwJqn5uWIK_FGUPCHoxDgiW0',
            'content-type: application/json;charset=UTF-8'
        ],
        'content' => $datos_post
    )
);

$contexto = stream_context_create($opciones);

$resultado = file_get_contents('https://oim.mapfre.com.pe/oim_polizas/api/form/person/equifax', false, $contexto);

echo '<pre>' . $resultado . '</pre>';
