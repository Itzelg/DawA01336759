
var ID = /^[0-9]+$/;
var NAME = /^([ÑA-Zña-z']+(\s*))+$/;
var RFC = /^[0-9]+$+[ÑA-Zña-z']/;
var DATE = "DATE";
var CORREO = /^([ÑA-Zña-z']+(\s*))+$/;

function test(type, subject){
    if(subject == null || type == null)
        return false;
    if(type == DATE){
        return true;
    }
    return type.test(subject);
}
