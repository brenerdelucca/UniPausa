<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use DateTime;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RegistroController extends Controller
{

    public function telaRelatorios()
    {
        return view('/relatorios/relatorioGeral');
    }

    public function relatorioPausa(Request $request)
    {
        $registros = DB::table('registros')
        ->join('users', 'users.id', '=', 'registros.user_id')
        ->select('users.nome_atendente', 'users.sobrenome_atendente', 'registros.dt_pausa', 'registros.hr_inicio_pausa', 'registros.hr_fim_pausa', 'registros.tempo_estimado_pausa')
        ->where('hr_fim_pausa', '<>', null)
        ->whereBetween('dt_pausa', [$request->data_inicial, $request->data_final])
        ->get();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('relatorioGeral');
        $sheet->setCellValue('A1', 'Atendente');
        $sheet->setCellValue('B1', 'Data');
        $sheet->setCellValue('C1', 'Hora inicio');
        $sheet->setCellValue('D1', 'Hora fim');
        $sheet->setCellValue('E1', 'Tempo estimado');
        $sheet->setCellValue('F1', 'Atraso(min)');
        $linha = 2;
        foreach($registros as $registro)
        {
            $sheet->setCellValueByColumnAndRow(1, $linha, $registro->nome_atendente. ' '. $registro->sobrenome_atendente);
            $sheet->setCellValueByColumnAndRow(2, $linha, substr($registro -> dt_pausa, 8).'/'.substr($registro -> dt_pausa, 5, 2).'/'.substr($registro -> dt_pausa, 0, 4));
            $sheet->setCellValueByColumnAndRow(3, $linha, substr($registro->hr_inicio_pausa, 0, 5));
            $sheet->setCellValueByColumnAndRow(4, $linha, substr($registro->hr_fim_pausa, 0, 5));
            $sheet->setCellValueByColumnAndRow(5, $linha, substr($registro->tempo_estimado_pausa, 0, 5));

            // $tempoEstimado = intval(substr($registro->tempo_estimado_pausa, 3, 2));

            // $horaInicio = intval(substr($registro->hr_inicio_pausa, 0, 2));

            // $minInicio = intval(substr($registro->hr_inicio_pausa, 3, 2));

            // $horaFim = intval(substr($registro->hr_fim_pausa, 0, 2));

            // $minFim = intval(substr($registro->hr_fim_pausa, 3, 2));

            // $tempoEmPausa = $minFim-$minInicio;

            // if($minInicio+$tempoEmPausa < 60)
            // {
            //     if($tempoEmPausa>$tempoEstimado)
            //     {
            //         $sheet->setCellValueByColumnAndRow(6, $linha, ($minFim-$minInicio)-$tempoEstimado);
            //     }
            // }

            $horaInicio = DateTime::createFromFormat('H:i', substr($registro->hr_inicio_pausa, 0, 5));

            $horaFim = DateTime::createFromFormat('H:i', substr($registro->hr_fim_pausa, 0, 5));

            $tempoEmPausa = $horaInicio->diff($horaFim);

            $tempoEstimado = intval(substr($registro->tempo_estimado_pausa, 3, 2));

            if($tempoEmPausa->h = 0){
                $sheet->setCellValueByColumnAndRow(6, $linha, $tempoEmPausa->i > $tempoEstimado ? $tempoEmPausa->i - $tempoEstimado : 0);
            }

            $linha++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'relatorioGeral' . time(). '.xlsx';
        $writer->save(storage_path('../public/relatorios/'.$filename));

        return redirect('/telaRelatorios');
    }
}
