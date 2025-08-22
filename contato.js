// ===== Config =====
const API_BASE = (location.pathname.match(/^(.*\/)/) || ['/'])[0];
const SLOTS = ["08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30"];

// estado
let advogadoAtualId = null;
let advogadoAtualNome = '';
let dataAtualISO = null;

// abrir calendário
function abrirCalendario(id, nome) {
  advogadoAtualId = id;
  advogadoAtualNome = nome || '';
  const t = document.getElementById('titulo-calendario');
  if (t) t.innerText = 'Agendar com ' + advogadoAtualNome;

  document.getElementById("advogados-section").classList.remove("active");
  document.getElementById("calendario-section").classList.add("active");
  gerarCalendario();
}

// gerar 30 dias
function gerarCalendario() {
  const calendario = document.getElementById("calendario");
  calendario.innerHTML = "";
  const hoje = new Date();
  for (let i = 0; i < 30; i++) {
    const d = new Date(hoje);
    d.setDate(hoje.getDate() + i);
    const dia = String(d.getDate()).padStart(2, '0');
    const mes = String(d.getMonth()+1).padStart(2, '0');
    const ano = d.getFullYear();
    const iso = `${ano}-${mes}-${dia}`;
    const cell = document.createElement("div");
    cell.innerText = dia;
    cell.title = iso;
    cell.onclick = () => mostrarHorarios(iso);
    calendario.appendChild(cell);
  }
}

// buscar horários reservados e desenhar botões
async function mostrarHorarios(isoDate) {
  dataAtualISO = isoDate;
  const area = document.getElementById("horarios");
  area.innerHTML = "Carregando...";

  let reservados = [];
  try {
    const r = await fetch(`${API_BASE}api_agenda_listar.php?advogado_id=${advogadoAtualId}&data=${isoDate}`, { cache: 'no-store' });
    const j = await r.json();
    if (j.ok) reservados = j.reservados || [];
    else console.warn('listar falhou:', j);
  } catch (e) {
    console.error('Erro listar:', e);
  }

  area.innerHTML = "";
  SLOTS.forEach(hora => {
    const btn = document.createElement("button");
    if (reservados.includes(hora)) {
      btn.disabled = true;
      btn.innerText = `${hora} (Reservado)`;
    } else {
      btn.innerText = hora;
      btn.onclick = () => reservarHorario(hora);
    }
    area.appendChild(btn);
  });
}
