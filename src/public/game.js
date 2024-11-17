const gameContainer = document.getElementById("game-container");

// Funkce pro načtení lokace z API
async function fetchLocation(locationId) {
  const response = await fetch(`/api/location/${locationId}`);
  if (!response.ok) {
    gameContainer.innerHTML = `<p>Chyba při načítání dat.</p>`;
    return null;
  }
  return await response.json();
}

// Funkce pro vykreslení lokace
async function renderLocation(locationId) {
  const location = await fetchLocation(locationId);
  if (!location) return;

  // Vymažeme předchozí obsah
  gameContainer.innerHTML = `
        <h1>${location.name}</h1>
        <p>${location.text}</p>
    `;

  // Pokud je to konec hry
  if (location.isEnding) {
    gameContainer.innerHTML += `
            <p><strong>Konec příběhu!</strong></p>
            <button onclick="renderLocation(1)">Začít znovu</button>
        `;
    return;
  }

  // Vykreslíme možnosti
  location.choices.forEach((choice) => {
    const button = document.createElement("button");
    button.textContent = choice.text;
    button.onclick = () => renderLocation(choice.id);
    gameContainer.appendChild(button);
  });
}

// Načtení první lokace
renderLocation(1);
