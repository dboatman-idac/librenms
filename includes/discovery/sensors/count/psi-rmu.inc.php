<?php

// rtuBms0DataRemainCapacity.0 - rtuBms7DataRemainCapacity.0
for ($index = 0; $index < 8; $index++) {
    $oid = '.1.3.6.1.4.1.56153.22.' . ($index + 4) . '.4.0';
    $capacity = SnmpQuery::get($oid)->value();
    if (is_numeric($capacity) && ! is_null($capacity)) {
        $descr = 'Battery String ' . $index . ' Capacity (mAh)';
        $type = 'psi-rmu';
        $divisor = 1;
        $currentValue = $capacity / $divisor;
        discover_sensor(null, 'count', $device, $oid, $index, $type, $descr, $divisor, '1', null, null, null, null, $currentValue);
    }
}
