using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using static Database.Tiempos;

namespace ConsoleApp1
{
    internal class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Read values of the Color enum");
            foreach (string i in Enum.GetNames(typeof(Dias)))
                Console.WriteLine(i);

            Console.ReadKey();
        }
    }
}
