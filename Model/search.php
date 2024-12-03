<?php
include("kcon.php");

// ตรวจสอบว่ามีค่า 'value' ที่ถูกส่งมาจาก JavaScript หรือไม่
if (isset($_POST['value'])) {
    $searchValue = $_POST['value'];

    // เขียนโค้ด SQL สำหรับดึงข้อมูลที่คุณต้องการ
    // $sql = "SELECT 
    // vn.vstdate ,ov.vsttime,vn.lastvisit
    // ,concat(pt.pname,pt.fname,' ',pt.lname) as fullname,pt.cid,pt.informaddr
    // ,concat(vn.age_y,' ปี',' ',vn.age_m,' เดือน') as age,if(pt.sex = '1','ชาย','หญิง' )as gender
    // ,ov.staff ,ov.pt_priority
    // ,ov.pttype,t.name ,vn.pdx ,ov.hospmain,ov.hospsub
    // ,concat(h1.hosptype , h1.name) as hospmainname
    // ,concat(h2.hosptype , h2.name) as hospsubname
    // ,ov.vn,ov.hn
    // ,round(sc.bw)as bw,round(sc.height)as height ,round(sc.bmi) as bmi,round(sc.fbs)as fbs
    // ,round(sc.temperature)as temperature,round(sc.pulse) as pulse
    // ,round(sc.bps) as bps,round(sc.bpd)as bpd,round(sc.rr)as rr,round(sc.waist) as waist
    // ,sc.cc,sc.hpi,sc.pmh,sc.fh,sc.pe,pt.clinic,concat(i.code,' :',i.name) as icdname,
    // concat(vn.dx0,' : ',i0.name) as icdname1,
    // concat(vn.dx1,' : ',i1.name) as icdname2,
    // concat(vn.dx2,' : ',i2.name) as icdname3,
    // concat(vn.dx3,' : ',i3.name) as icdname4,
    // concat(vn.dx4,' : ',i4.name) as icdname5,
    // da.agent,da.symptom
    // from vn_stat vn
    // left outer join patient pt on pt.hn=vn.hn
    // left outer join pttype t on t.pttype = vn.pttype
    // LEFT OUTER JOIN opdscreen sc on sc.vn = vn.vn
    // LEFT OUTER JOIN ovst ov on ov.vn = vn.vn
    // LEFT OUTER JOIN hospcode h1 on h1.hospcode =ov.hospmain
    // LEFT OUTER JOIN hospcode h2 on h2.hospcode =ov.hospsub
    // LEFT OUTER JOIN icd101 i on i.code=vn.pdx
    // LEFT OUTER JOIN icd101 i0 on i0.code=vn.dx0
    // LEFT OUTER JOIN icd101 i1 on i1.code=vn.dx1
    // LEFT OUTER JOIN icd101 i2 on i.code=vn.dx2
    // LEFT OUTER JOIN icd101 i3 on i3.code=vn.dx3
    // LEFT OUTER JOIN icd101 i4 on i4.code=vn.dx4
    // left outer join opd_allergy da on da.hn=vn.hn
    // WHERE vn.vstdate BETWEEN CONCAT(YEAR(NOW()) -1 , '-01-01') AND DATE(NOW()) and ov.hn = '" . $searchValue . "' and i.code != 'Z480'
    // ORDER BY vn.vstdate DESC LIMIT 0,1";

    $sql = "SELECT * from vn_stat
    WHERE vstdate BETWEEN CONCAT(YEAR(NOW()) -1 , '-01-01') AND DATE(NOW()) and hn = '" . $searchValue . "'
    ORDER BY vstdate DESC LIMIT 0,1";

    $result = $conn->query($sql);

    if ($result != '') {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    } else {
        echo json_encode(["hn" => "ไม่พบข้อมูล"]);
    }
}
