<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    :root {
        --primary: #6366f1;
        --primary-hover: #4f46e5;
        --dark: #0f172a;
        --bg: #f3f4f6;
        --white: #ffffff;
        --text-main: #1e293b;
        --text-muted: #64748b;
    }

    * { box-sizing: border-box; transition: all 0.2s ease; }
    body { font-family: 'Inter', system-ui, sans-serif; background: var(--bg); margin: 0; display: flex; color: var(--text-main); line-height: 1.5; }

    /* Layout Responsif */
    .sidebar { width: 260px; background: var(--dark); min-height: 100vh; color: white; padding: 2rem; position: fixed; z-index: 10; }
    .main { margin-left: 260px; padding: 2rem; width: 100%; min-width: 0; }

    @media (max-width: 768px) {
        body { flex-direction: column; }
        .sidebar { width: 100%; min-height: auto; position: relative; padding: 1.5rem; }
        .main { margin-left: 0; padding: 1rem; }
    }

    /* Components */
    .card { background: var(--white); padding: 2rem; border-radius: 16px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border: 1px solid #e5e7eb; }
    .form-box { background: #f8fafc; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; border: 1px solid #e2e8f0; }
    
    .form-inline { display: flex; flex-wrap: wrap; gap: 1rem; }
    .form-inline input, .form-inline select { flex: 1; min-width: 200px; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem; }
    .form-inline input:focus { border-color: var(--primary); outline: none; box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2); }

    /* Table Responsif */
    .table-container { width: 100%; overflow-x: auto; margin-top: 1rem; border-radius: 8px; }
    table { width: 100%; border-collapse: collapse; min-width: 600px; }
    th { background: #f8fafc; padding: 1rem; text-align: left; font-size: 0.8rem; text-transform: uppercase; color: var(--text-muted); border-bottom: 2px solid #edf2f7; }
    td { padding: 1rem; border-bottom: 1px solid #f1f5f9; font-size: 0.95rem; }

    /* Buttons */
    .btn { padding: 0.75rem 1.25rem; border-radius: 8px; cursor: pointer; text-decoration: none; border: none; font-size: 0.875rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; }
    .btn-blue { background: var(--primary); color: white; }
    .btn-blue:hover { background: var(--primary-hover); }
    .btn-red { background: #ef4444; color: white; }
    .btn-green { background: #10b981; color: white; }
    .btn-orange { background: #f59e0b; color: white; }

    .badge { padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }
</style>
<script>
    function fillEdit(id, no, jen, per) {
        let form = document.getElementById('form-container');
        if(form) {
            form.style.display = 'block';
            document.getElementById('form-title').innerText = "✏️ Edit Surat";
            document.getElementById('btn-action').name = "do_edit";
            document.getElementById('btn-action').innerText = "Simpan Perubahan";
            document.getElementById('id_s').value = id;
            document.getElementById('in_no').value = no;
            document.getElementById('in_jen').value = jen;
            document.getElementById('in_per').value = per;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }
</script>