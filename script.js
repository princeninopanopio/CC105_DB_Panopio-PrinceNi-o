function show(id){
  document.querySelectorAll("section").forEach(s=>s.style.display="none");
  document.getElementById(id).style.display="block";
}

function loadAppointments(){
  fetch("appointments/list.php")
  .then(res=>res.text())
  .then(data=>{
    document.getElementById("appointmentList").innerHTML = data;
  });
}

document.getElementById("appointmentForm").onsubmit = function(e){
  e.preventDefault();
  fetch("appointments/add.php", {
    method:"POST",
    body:new FormData(this)
  }).then(()=>{
    this.reset();
    loadAppointments();
  });
};

function deleteAppointment(id){
  let fd = new FormData();
  fd.append("id", id);

  fetch("appointments/delete.php", {
    method:"POST",
    body:fd
  }).then(()=>loadAppointments());
}

loadAppointments();
