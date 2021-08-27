<?php

namespace App\DataTables;

use App\App\StudentDataTable;
use App\SmsSection;
use App\SmsStudent;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use PDF;
class StudentDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('full_name', function($query){
                return $query->full_name;
            })
            // ->editColumn('student_gender', function($query){
            //     return $query->student_gender;
            // })
            // ->addColumn('student_session', function($query){
            //     return $query->student_session;
            // })
            // ->addColumn('student_year', function($query){
            //     return $query->student_year;
            // })
            // ->editColumn('student_class', function($query){
            //     return $query->student_class;
            // })
            // ->editColumn('student_group', function($query){
            //     return $query->student_group;
            // })
            // ->editColumn('student_section', function($query){
            //     return $query->student_section;
            // })
            ->addColumn('action', function($query){
                   $btn = '
                   <a href="'.route('student.edit', $query->id).'" class="btn edit-btn btn-primary">Edit</a>
                   ';
                    return $btn;
            })
            ->filterColumn('full_name', function($query, $keyword) {
                $sql = "CONCAT(sms_students.first_name,' ',sms_students.last_name)  like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('active_status', function($query) {
                return '<input type="checkbox" onchange="changeStudentStatus('.$query->id.','.$query->id.')">';
                
            })->rawColumns(['action', 'active_status'])
            ;

          
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\StudentDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SmsStudent $model)
    {
        $student = SmsStudent::query()
                ->select(
                [
                    'sms_students.*', 
                    'sms_sections.id', 
                    'sms_classes.id', 
                    'sms_groups.id', 
                    'sms_sessions.id', 
                    'sms_years.id', 
                    'sms_sections.name as section', 
                    'sms_classes.name as class', 
                    'sms_groups.name as group', 
                    'sms_sessions.name as session',
                    'sms_years.name as year'
                ])
              
                ->leftJoin('sms_sections', 'sms_sections.id', '=', 'sms_students.section')
                ->leftJoin('sms_classes', 'sms_classes.id', '=', 'sms_students.class')
                ->leftJoin('sms_groups', 'sms_groups.id', '=', 'sms_students.group')
                ->leftJoin('sms_sessions', 'sms_sessions.id', '=', 'sms_students.session')
                ->leftJoin('sms_years', 'sms_years.id', '=', 'sms_students.year');
                
        return $student;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('studentdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0)
                    ->dom('Bfrtip')
                    ->columns([
               
                        'student_id' => ['name' => 'sms_students.student_id'],
                        'full_name' => ['title' => 'Name'],
                        'section' => ['name' => 'sms_sessions.name'],
                        'year' => ['name' => 'sms_years.name'],
                        'class' => ['name' => 'sms_classes.name'],
                        'group' => ['name' => 'sms_groups.name'],
                        'session' => ['name' => 'sms_sections.name'],
                        'sms_no' =>['name' => 'sms_students.sms_no'],
                        'active_status' =>['title' => 'active status'],
                        'action' =>['title' => 'action'],
                    ])
                    // ->buttons(
                    //     Button::make('csv'),
                    //     Button::make('Pdf'),
                    // );
                    ->parameters([
                        'buttons' => ['csv','pdf'],
                     ]);
                     
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::make('student_id'),
            // Column::make('full_name')->title('Name'),
            // Column::make('gender')->title('Gender'),
            // Column::make('session')->title('Session'),
            // Column::make('year')->title('Year'),
            // Column::make('class')->title('Class'),
            // Column::make('group')->title('Group'),
            // Column::make('section')->title('Section'),
            // Column::make('sms_no'),
            // Column::computed('action')
            // ->exportable(false)
            // ->printable(false)
            // ->width(60)
            // ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StudentDataTables_' . date('YmdHis');
    }
}
