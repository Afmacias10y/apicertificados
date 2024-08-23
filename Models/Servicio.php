<?php
class Servicio extends Conectar {
    public function get_servicio() {
        $conectar = parent::Conexion();
        $sql = "SELECT co_detalcompr.dcoano, co_detalcompr.dcocuenta, co_detalcompr.dcocodielem2, co_detalcompr.dcocodielem3, Un_tercegener.tgenombcomp, 
CASE dcooperacion WHEN '1' THEN co_detalcompr.dcovalomoneloca ELSE co_detalcompr.dcovalomoneloca * -1 END, co_detalcompr.dcovalobasereteiva, 
CASE WHEN dcovalobasereteiva <> 0 THEN (CASE dcooperacion WHEN '1' THEN co_detalcompr.dcovalomoneloca * 100/co_detalcompr.dcovalobasereteiva 
ELSE (co_detalcompr.dcovalomoneloca * -1) * 100/co_detalcompr.dcovalobasereteiva END) ELSE 0 END, co_detalcompr.dcovalobase, co_detalcompr.dcotipoimpurete, 
co_detalcompr.dcocuentabase, co_detalcompr.dcofechconta, co_detalcompr.dcofechtran, co_detalcompr.dcocodielem4, co_detalcompr.dcolote, co_detalcompr.dcofuente, 
co_detalcompr.dcocomprobante, co_detalcompr.dcodivision, Co_cuentas.cuenombre, co_ingeeleimp.igenombcort, Un_tercegener.tgedireline1 +' '+ Un_ciudades.ciunombre, 
Un_tercegener.tgeciudad, Un_ciudades.ciunombre, co_detalcompr.dcoperiodo, co_detalcompr.dcodivisencab, un_tercegener.tgetelefono1, cp_encdocpago.edpclasedocum, 
cp_encdocpago.edpprefijo, cp_encdocpago.edpnumero, cp_encdocpago.edpfechexpe, co_detalcompr.dcoorigen, un_tercegener.tgeactivecono, un_activecono.aecnombre 
FROM co_detalcompr 
JOIN co_ingeeleimp ON co_detalcompr.dcocodielem2 = co_ingeeleimp.igecodigo AND co_detalcompr.dcocompania = co_ingeeleimp.igecompania AND co_ingeeleimp.igeidentificador = 2 
JOIN co_cuentas ON co_detalcompr.dcocuenta = Co_cuentas.cuecodigo AND co_detalcompr.dcocompania = Co_cuentas.cuecompania 
JOIN un_tercegener ON co_detalcompr.dcocodielem3 = Un_tercegener.tgecodigo AND co_detalcompr.dcocompania = Un_tercegener.tgecompania 
JOIN un_ciudades ON Un_tercegener.tgepais = un_ciudades.ciupais AND Un_tercegener.tgedepartamen = un_ciudades.ciudepto AND Un_tercegener.tgeciudad = un_ciudades.ciucodigo AND Un_tercegener.tgecompania = un_ciudades.ciucompania 
LEFT OUTER JOIN cp_encdocpago ON co_detalcompr.dcocompania = cp_encdocpago.edpcompania AND co_detalcompr.dcocampo2 = cp_encdocpago.edptipocons AND co_detalcompr.dcocampo3 = cp_encdocpago.edpconsecutivo 
LEFT OUTER JOIN un_activecono ON un_activecono.aeccompania = Un_tercegener.tgecompania AND un_activecono.aeccodigo = un_tercegener.tgeactivecono 
WHERE (((co_detalcompr.dcoano = 2024))) AND co_detalcompr.dcocompania = '01' AND Co_detalcompr.dcoperiodo >= 1 AND Co_detalcompr.dcoperiodo <= 12 
AND Co_cuentas.cueclasificacio = 'I' AND Co_cuentas.cuebaseivaretefte = 'S' AND Co_cuentas.cuetipoivaretefte = 'V' AND Co_detalcompr.dcoestado = 'D'  
and (((co_detalcompr.dcoano =  2024)))";
        $stmt = sqlsrv_query($conectar, $sql);

        if ($stmt === false) {
            return ["error" => "Error en la consulta SQL", "details" => sqlsrv_errors()];
        }

        $servicios = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $servicios[] = $row;
        }

        return $servicios;
    }
}
?>