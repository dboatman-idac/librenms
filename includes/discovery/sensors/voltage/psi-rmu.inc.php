<?php

// rtuBms0DataPackVolt.0 - rtuBms7DataPackVolt.0
for ($index = 0; $index < 8; $index++) {
    $divisor = 1000;
    $oid = '.1.3.6.1.4.1.56153.22.' . ($index + 4) . '.1.0';
    $descr = 'Battery String ' . $index . ' Pack Voltage';
    $type = 'psi-rmu';
    $packVoltage = SnmpQuery::get($oid)->value();
    $currentValue = $packVoltage / $divisor;
    discover_sensor(null, 'voltage', $device, $oid, $index, $type, $descr, $divisor, '1', null, null, null, null, $currentValue);
}
