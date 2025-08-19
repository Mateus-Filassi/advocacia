function abrirCalendario(advogado) {
    document.getElementById("advogados-section").classList.remove("active");
    document.getElementById("calendario-section").classList.add("active");
    gerarCalendario();
  }
  
  function gerarCalendario() {
    const calendario = document.getElementById("calendario");
    calendario.innerHTML = "";
    for (let dia = 1; dia <= 30; dia++) {
      const div = document.createElement("div");
      div.innerText = dia;
      div.onclick = () => mostrarHorarios(dia);
      calendario.appendChild(div);
    }
  }
  
  function mostrarHorarios(dia) {
    const horarios = document.getElementById("horarios");
    horarios.innerHTML = "";
    const slots = ["08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30"];
    slots.forEach(hora => {
      const btn = document.createElement("button");
      btn.innerText = hora;
      btn.onclick = () => {
        btn.disabled = true;
        btn.innerText = hora + " (Reservado)";
      };
      horarios.appendChild(btn);
    });
  }
  