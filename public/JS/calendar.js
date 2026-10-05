document.addEventListener('DOMContentLoaded', function() {
  const today = new Date();
  
  const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"];
  const currentMonthEl = document.getElementById('current-month');
  if (currentMonthEl) {
    currentMonthEl.innerText = monthNames[today.getMonth()];
  }

  const dayOfWeek = today.getDay(); 
  const distanceToMonday = dayOfWeek === 0 ? -6 : 1 - dayOfWeek;
  const monday = new Date(today);
  monday.setDate(today.getDate() + distanceToMonday);

  const dayLabels = ["Sen", "Sel", "Rab", "Kam", "Jum"];
  const container = document.getElementById('calendar-days');
  if (!container) return;
  
  container.innerHTML = '';

  for (let i = 0; i < 5; i++) {
    const currentDate = new Date(monday);
    currentDate.setDate(monday.getDate() + i);

    const isToday = currentDate.toDateString() === today.toDateString();

    const dayCard = document.createElement('div');
    if (isToday) {
      dayCard.className = "p-2 rounded-xl bg-blue-600 text-white shadow-md shadow-blue-500/30";
      dayCard.innerHTML = `
        <p class="text-[10px] opacity-80 font-medium">${dayLabels[i]}</p>
        <p class="text-xs font-bold mt-1">${currentDate.getDate()}</p>
      `;
    } else {
      dayCard.className = "p-2 rounded-xl bg-slate-50";
      dayCard.innerHTML = `
        <p class="text-[10px] text-gray-400 font-medium">${dayLabels[i]}</p>
        <p class="text-xs font-bold text-gray-700 mt-1">${currentDate.getDate()}</p>
      `;
    }

    container.appendChild(dayCard);
  }
});