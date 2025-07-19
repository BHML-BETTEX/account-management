document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('tableSearch');
  const clearBtn = document.querySelector('.clear-btn');
  const tableRows = document.querySelectorAll('#mainHeadTable tbody tr');

  if (!searchInput || !clearBtn || !tableRows.length) return;

  searchInput.addEventListener('input', () => {
    clearBtn.style.display = searchInput.value ? 'block' : 'none';

    const filter = searchInput.value.toLowerCase();
    tableRows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(filter) ? '' : 'none';
    });
  });

  clearBtn.addEventListener('click', () => {
    searchInput.value = '';
    clearBtn.style.display = 'none';
    tableRows.forEach(row => row.style.display = '');
    searchInput.focus();
  });
});
