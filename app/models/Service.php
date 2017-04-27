<?php

class Service extends Eloquent {
	use SoftDeletingTrait;
	protected $fillable=['report_type','station_location','contact_person','contact_nos','service_date','pump_phone_in_concern','phone_in_by','call_slip_no','time_start','time_end','pump_manufacturer','pump_model','pump_serial_no','service_by','pump_no','hose_no','product','totalizer_before_service','totalizer_after_service','total_ltrs_used','pump_condition_before_repair','work_details','remarks_result','final_counter_measure','ten_ltrs_calibration_check','one_ltr_calibration_check','qty_unit','replace_parts','unit_cost','unit_total','under_warranty','charge_to','conforme','service_charge','service_total'];
	
    protected $dates = ['deleted_at'];

    				
}