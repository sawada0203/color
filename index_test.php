<h3>COPD</h3>
<form>
    <div class="row pt-3">
        <div class="col-5 pt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckMild_COPD">
                <label class="form-check-label" for="flexCheckMild">
                    <h5>Mild</h5>
                    <p>-ไม่มีอาการหอบกำเริบ/ไม่มี Exacerbation</p>
                    <p>-สมรรถภาพปอด : FEV1 >= 80% ของค่ามาตรฐาน</p>
                </label>
            </div>
        </div>
        <div class="col-5 pt-3">
            <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
            <p>-J44</p>
            <p>-FEV1 >= 80% (ข้อมูลใน HPI)</p>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-5 pt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckModerate_COPD">
                <label class="form-check-label" for="flexCheckModerate">
                    <h5>Moderate</h5>
                    <p>-มีอาการหอบกำเริบเล็กน้อย,มี Exacerbation ไม่รุนแรง</p>
                    <p>-สมรรถภาพปอด: FEV1 50-79 % ของค่ามาตรฐาน</p>
                </label>
            </div>
        </div>
        <div class="col-5 pt-3">
            <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
            <p>-J44</p>
            <p>-FEV1 50-79 % (ข้อมูลใน HPI)</p>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-5 pt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckSevere_COPD">
                <label class="form-check-label" for="flexCheckSevere">
                    <h5>Severe</h5>
                    <p>-มีอาการหอบกำเริบจนรบกวนกิจวัตรประจำวัน,มี Exacerbation ที่รุนแรง</p>
                    <p>-Revisit admit ด้วย Exacerbation ภายใน 28 วัน </p>
                    <p>-สมรรถภาพปอด : FEV1 30-49 %ของค่ามาตรฐาน (ข้อมูลอยู่ใน C.C., P.I.) </p>
                </label>
            </div>
        </div>
        <div class="col-5 pt-3">
            <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
            <p>-J44.1</p>
            <p>-FEV1 30-49 % (ข้อมูลใน HPI)</p>
            <p>-Re-admit ด้วย Exacerbation ภายใน 28 วัน </p>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-7 pt-3">
            <label for="Note" class="form-label">*หมายเหตุ</label>
            <textarea class="form-control" id="NoteCOPD" rows="2"></textarea>
        </div>
    </div>
</form>
</div>
</div>
<div class="tab-pane fade" id="tab-content-asthma">
    <div class="modal-body">
        <!-- เนื้อหาสำหรับแท็บ "Asthma" จะถูกเพิ่มที่นี่ -->
        <h3>Asthma</h3>
        <form>
            <div class="row pt-3">
                <div class="col-5 pt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckMild_Asthma">
                        <label class="form-check-label" for="flexCheckMild">
                            <h5>Mild</h5>
                            <p>-ไม่มีอาการหอบกำเริบ/ไม่มี Exacerbation</p>
                            <p>-สมรรถภาพปอด : FEV1 >= 80% ของค่ามาตรฐาน</p>
                        </label>
                    </div>
                </div>
                <div class="col-5 pt-3">
                    <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
                    <p>-J44.8-J45.9</p>
                    <p>-FEV1 >= 80% (ข้อมูลใน HPI)</p>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-5 pt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckModerate_Asthma">
                        <label class="form-check-label" for="flexCheckModerate">
                            <h5>Moderate</h5>
                            <p>-มีอาการหอบกำเริบเล็กน้อย,มี Exacerbation ไม่รุนแรง</p>
                            <p>-สมรรถภาพปอด: FEV1 60-80 % ของค่ามาตรฐาน</p>
                        </label>
                    </div>
                </div>
                <div class="col-5 pt-3">
                    <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
                    <p>-J44.8-J45.9</p>
                    <p>-PEF หรือ FEV1 60-80 %</p>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-5 pt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckSevere_Asthma">
                        <label class="form-check-label" for="flexCheckSevere">
                            <h5>Severe</h5>
                            <p>-มีอาการหอบกำเริบจนรบกวนกิจวัตรประจำวัน, มี Exacerbation ที่รุนแรง Revisit admit ด้วย Exacerbation ภายใน 28 วัน</p>
                            <p>-PEF หรือ FEV1 < 60% ของค่ามาตรฐาน (ข้อมูลอยู่ใน C.C., P.I.)</p>
                        </label>
                    </div>
                </div>
                <div class="col-5 pt-3">
                    <h5>ICD 10/ข้อมูลที่ใช้วัด</h5>
                    <p>-J46</p>
                    <p>-PEF หรือ FEV1 < 60 %</p>
                            <p>-Re-admit ด้วย Exacerbation ภายใน 28 วัน </p>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-7 pt-3">
                    <label for="Note" class="form-label">*หมายเหตุ</label>
                    <textarea class="form-control" id="NoteAsthma" rows="2"></textarea>
                </div>
            </div>
        </form>
    </div>
</div>