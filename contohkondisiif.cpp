#include <iostream>
using namespace std;

void main ()
{
    int i=55, input;

    cout << "Silahkan Input nilai anda : ";
    cin >> input;

    if (input > 55)
    {
        cout << "\nanda LULUS";
    }
    else { cout << "anda TIDAK LULUS";}
    return 0;
}