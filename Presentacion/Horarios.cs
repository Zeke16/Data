using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static Database.Tiempos;

namespace Presentacion
{
    public partial class Horarios : Form
    {
        public Horarios()
        {
            InitializeComponent();
            initializeDataComboBox();
        }

        public void initializeDataComboBox()
        {
            foreach (int i in Enum.GetValues(typeof(Horas))) {
                cboxHoraInicio.Items.Add(i);
            }

            foreach (int i in Enum.GetValues(typeof(Horas)))
            {
                cboxHoraFin.Items.Add(i);
            }

            cboxAmPm.Items.AddRange(Enum.GetNames(typeof(Horario)));
            cboxHoraInicio.SelectedIndex = 0;
            cboxHoraFin.SelectedIndex = 0;
            cboxAmPm.SelectedIndex = 0;
        }

        private void btnGuardar_Click(object sender, EventArgs e)
        {
            string materia, inicio, fin, horario, mensaje;
            materia = txtMateria.Text;
            inicio = cboxHoraInicio.SelectedItem.ToString();
            fin = cboxHoraFin.SelectedItem.ToString();
            horario = cboxAmPm.SelectedItem.ToString();
            if(string.IsNullOrEmpty(materia) || string.IsNullOrWhiteSpace(materia))
            {
                MessageBox.Show("Escribe una materia");
                return;
            }
            mensaje = $"Materia: {materia}, Hora de inicio: {inicio}, Hora de fin {fin}, Horario: {horario}";
            listMaterias.Items.Add(mensaje);
            txtMateria.Clear();
        }
    }
}
