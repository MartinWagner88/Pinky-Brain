<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title>Verlauf erstellen</title>
</head>

<body>



<form id="formular_verlauf"  method="post" class="form-group">

<div class="container-fluid">
  <div class="row">
    <div class="well col-sm-12">
      <h4>Allgemeine Informationen</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <div class="">
        <label for="arzt">Arzt:</label>
      </div>
      <select name="arzt" id="arzt">
      <option label="Dr. Wagner">Dr. Wagner</option>
      <option label="Dr. Vetter">Dr. Vetter</option>
      </select>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <div class="">
          <label for="az">Allgemeinzustand:</label>
        </div>
        <div class="radio">
            <label><input type="radio"  name="az" id"az_gut" value="gut" checked="checked"/> gut</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="az" value="leichtRe"/> leicht reduziert</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="az" value="deutlRe"/> deutlich reduziert</label>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <div class="">
          <label for="kgKG">K&ouml;rpergewicht:</label>
        </div>
        <div class="">
          <label for="kgKG">
          <input type="number" min="25" max="250" step="0.1" id="kgKG" name="kgKG" required="required"/>
          kg</label>
        </div>
        <div class="radio">
            <label><input type="radio"  name="gewVer" value="stabil" checked="checked"/> stabil</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="gewVer" value="steigend"/> steigend</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="gewVer" value="fallend"/> fallend</label>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
        <div class="">
          <label for="wieVorZahl">Wiedervorstellung in:</label>
        </div>
        <div class="">
          <label for="wieVorZahl">
            <input type="number" min="0" max="100" step="1" id="wieVorZahl" name="wieVorZahl"/>
          </label>
        </div>
        <div class="">
          <label for="wieVorEinheit">
          <select name="wieVorEinheit" id="wieVorEinheit">
          <option label="Monat(en)" selected="selected">Monat(en)</option>
          <option label="Wochen(n)">Woche(n)</option>
          <option label="Jahr(en)">Jahr(en)</option>
          </select>
          </label>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="well col-sm-12">
      <h4>Diagnosen</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <div class="">
        <label><input type="checkbox" onclick="darstellung()" name="psc_anzeige" id="psc_anzeige" value="j" /> PSC</label>
      </div>
      <div class="form-group" id="group_psc" style="display:none">
        <!-- style="display:none" -->
        <div class="">
          <label id="slidecontainerLabel" for="slidecontainer">Intensität des Pruritus: (?/10):</label>
        </div>
        <div id="slidecontainer">
          <input type="range" min="0" max="10" value="0" class="slider" id="pruritus" name="pruritus" style="width:100%">
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="">
        <label><input type="checkbox" onclick="darstellung()" name="hepB_anzeige" id="hepB_anzeige" value="j" /> Hepatitis B</label>
      </div>
      <div class="form-group" id="group_hepatitis_B" style="display:none">
        <div class="form-group">
          <div class="">
            <label for="gpt">GPT: </label>
          </div>
          <input type="number" min="0" max="50000" step="0.1" id="gpt" name="gpt"/>
          <label for="gpt">U/l</label>
        </div>
        <div class="form-group">
          <div class="">
              <label for="hbv_dna">HBV-DNA:</label>
          </div>
          <input type="number" min="0" max="10000000000" step="1" id="hbv_dna" name="hbv_dna"/>
          <label for="hbv_dna">U/l</label>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="text-center">
        <label><input type="checkbox" onclick="darstellung()" name="leZi_anzeige" id="leZi_anzeige" value="j" /> Leberzirrhose</label>
      </div>
      <div class="form-group" id="group_leZi" style="display:none">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="">
                <label for="blutung">Gastrointestinale Blutung:</label>
              </div>
              <label class="radio-inline"><input type="radio" name="blutung" value="n" checked="checked"> nein</label>
              <label class="radio-inline"><input type="radio" name="blutung" value="h"> H&auml;matemesis</label>
              <label class="radio-inline"><input type="radio" name="blutung" value="t"> Teerstuhl</label>
              <label class="radio-inline"><input type="radio" name="blutung" value="b"> H&auml;matemesis und Teerstuhl</label>
              <label class="radio-inline"><input type="radio" name="blutung" value="s"> sonstige Blutung</label>
            </div>

            <div class="form-group">
              <div class="">
                <label for="hepEnz">Hepatische Enzephalopathie: </label>
              </div>
              <label class="radio-inline"><input type="radio" name="hepEnz" value="1" checked="checked"/> nein</label>
              <label class="radio-inline"><input type="radio" name="hepEnz" value="2"/> leichtgradig</label>
              <label class="radio-inline"><input type="radio" name="hepEnz" value="3"/> ausgepr&auml;gt</label>
            </div>
            <div class="form-group">
              <div class="">
                <label for="aszites">Aszites: </label>
              </div>
              <label class="radio-inline"><input type="radio"  name="aszites" value="1" checked="checked"/> nein</label>
              <label class="radio-inline"><input type="radio" name="aszites" value="2"/> leichtgradig</label>
              <label class="radio-inline"><input type="radio" name="aszites" value="3"/> ausgepr&auml;gt</label>
            </div>
            <div class="form-group">
              <div class="">
                <label for="dialyse">Dialyse:</label>
                <a data-toggle="popover" title="" data-content="Wurde der Patient in der letzten Woche mindestens zweimal dialysiert?"><span class="glyphicon glyphicon-question-sign"></span></a>
                <!-- <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a> -->

              </div>
              <label><input type="radio"  name="dialyse" value="0" checked="checked"/> nein</label>
              <label><input type="radio" name="dialyse" value="1"/> ja</label>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="">
                <label for="albumin">Albumin:</label>
              </div>
              <input type="number" min="5" max="100" step="0.1" id="albumin" name="albumin"/>
              <label for="albumin">g/l</label>
            </div>
            <div class="form-group">
              <div class="">
                  <label for="inr">INR: </label>
              </div>
              <input type="number" min="0" max="50" step="0.01" id="inr" name="inr"/>
            </div>
            <div class="form-group">
              <div class="">
                <label for="bili">Bilirubin: </label>
              </div>
              <input type="number" min="0" max="100" step="0.1" id="bili" name="bili"/>
              <label for="bili">mg/dl</label>
            </div>
            <div class="form-group">
              <div class="">
                <label for="krea">Kreatinin: </label>
              </div>
              <input type="number" min="0" max="30" step="0.1" id="krea" name="krea"/>
              <label for="krea">mg/dl</label>
            </div>


          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="well">
      <h4>Ergebnis</h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <div class="text-center">
        <label for="">Klinischen Verlauf generieren</label>
      </div>
      <div class="">
        <button type="button" id="button_kommentar"class="btn btn-info btn-block" onclick="formular_validierung()"> Kommentar generieren</button>
        <button type="button" onclick="formular_ajax()" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Speichern</button>
        <button type="reset" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-refresh"></span>  Zurücksetzen</button>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="text-center">
        <label for="kommentar_text">Klinischer Verlauf (automatisch generiert)</label>
      </div>
      <div id="kommentar_generiert" style="width:100%">
        <textarea rows="5" style="width:100%" id="kommentar_text" name="kommentar_text" type="text">
        </textarea>
      </div>
      <p style="color:red; display:none" id="kommentar_fehler">Da nicht alle Plfichtfelder ausgefüllt wurden, konnte das Kommentar nicht aktualisiert werden. Die erforderlichen Angaben wurden rot markiert.</p>
    </div>
    <div class="col-sm-3">
      <div class="text-center">
        <label for="">Klinische Ergebnisse</label>
      </div>
      <button type="button" id="button_empfehlung"class="btn btn-basic btn-block disabled" style=""> Empfehlungen </button>
      <button type="button" id="child_e" name="child_e" class="btn btn-basic btn-block disabled" style=""> Child-Pugh </button>
      <button type="button" id="meld_e" name="meld_e" class="btn btn-basic btn-block disabled" style=""> MELD </button>
    </div>
  </div>
</div>

<div style="display:none">
<input type="hidden" name="child_t" id="child_t"/>
<input type="hidden" name="meld_t" id="meld_t"/>
<input type="hidden" name="id_patient_t" id="id_patient_t"/>
</div>

</form>

<div id="speicherung_erfolgreich_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Die Daten wurden erfolgreich gespeichert.</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
