#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <time.h>

using namespace std;

int deli(int *zacetek, int dno,int vrh)
{
    int m = (dno+vrh)/2;
    int temp3  =zacetek[dno];
    zacetek[dno] = zacetek[m];
    zacetek[m] = temp3;

    int pe = zacetek[dno];
    int l = dno;
    int d = vrh;
    while(l<d)
    {
        while((zacetek[l]<=pe)&&l<vrh)
        {
            l++;
        }

        while((zacetek[d]>=pe)&&d>dno)
        {
            d--;
        }
        if(l<d)
        {
            int temp  =zacetek[l];
            zacetek[l] = zacetek[d];
            zacetek[d] = temp;
        }
    }
    int temp2  =zacetek[dno];
    zacetek[dno] = zacetek[d];
    zacetek[d] = temp2;

    return d;
}

void hitroUredi(int *zacetek, int dno,int vrh)
{
    if(dno<vrh)
    {
        int j = deli(zacetek, dno, vrh);
        hitroUredi(zacetek, dno, j-1);
        hitroUredi(zacetek, j+1, vrh);
    }
}

bool preveri(int *zacetek, int dno, int vrh)
{
    for(int i = dno; i<vrh;i++)
    {
        if(zacetek[i+1]<zacetek[i])
        {
            return false;
        }
    }
    return true;
}



int main()
{
    clock_t start, finish;
    double duration;

    srand (time(NULL));
    int *polje;
    string izbira;
    int poljeVelikost;
    do
    {
        cout<<"\n**************************";
        cout<<"\nHitro uredi - izbira:"<<endl;
        cout<<"1) Generiraj nakljucno zaporedje"<<endl;
        cout<<"2) Generiraj urejeno narascajoce zaporedje"<<endl;
        cout<<"3) Generiraj urejeno padajoce zaporedje"<<endl;
        cout<<"4) Izpis zaporedja"<<endl;
        cout<<"5) Preveri ali je zaporedje urejeno"<<endl;
        cout<<"6) Uredi s hitrim urejanjem"<<endl;
        cout<<"7) Konec"<<endl;
        cout<<"**************************"<<endl;

        cout << "Izbira: " << endl;
        cin >> izbira;
        if(izbira=="1")
        {
            cout<<"Vnesi zeljeno velikost polja!"<<endl;
            cin>>poljeVelikost;
            polje = new int[poljeVelikost];
            for(int i  = 0; i<poljeVelikost; i++)
            {
                polje[i] = rand() % 100 + 1;
            }
            cout<<"Polje ustvarjeno!"<<endl;
        }
        else if(izbira=="2"){
            cout<<"Vnesi zeljeno velikost polja!"<<endl;
            cin>>poljeVelikost;
            polje = new int[poljeVelikost];
            for(int i  = 0; i<poljeVelikost; i++)
            {
                polje[i] = i+1;
            }
            cout<<"Polje ustvarjeno!"<<endl;
        }
        else if(izbira=="3"){
            cout<<"Vnesi zeljeno velikost polja!"<<endl;
            cin>>poljeVelikost;
            polje = new int[poljeVelikost];
            int stej = 0;
            for(int i  = poljeVelikost; i>0; i--)
            {
                polje[stej] = i;
                stej++;
            }
            cout<<"Polje ustvarjeno!"<<endl;
        }
        else if(izbira=="4")
        {
            for(int i = 0; i<poljeVelikost;i++)
            {
                cout<<polje[i]<<" ";
            }
            cout<<endl;
        }
        else if(izbira=="5"){
            if(preveri(polje, 0, poljeVelikost))
            {
                cout<<"Polje je pravilno urejeno!"<<endl;
            }
            else
            {
                cout<<"Polje ni urejeno!"<<endl;
            }
        }
        else if(izbira=="6"){
            start = clock();
            hitroUredi(polje, 0, poljeVelikost-1);
            finish = clock();
            duration = (double)(finish - start)/CLOCKS_PER_SEC;
            //cout<<duration<<endl;
            cout<<"Polje urejeno!"<<endl;
        }
    }while(izbira!="7");

    return 0;
}

/*
Nakljucno (brez omejitev): 0.547
Nakljucno (brez omejitev) brez mediane: 0.532
Nakljucno (0-100): 38.328
Nakljucno (0-100) brez mediane: 37.819
Nakljucno (0-1000): 3.786
Nakljucno (0-1000) brez mediane: 4.824

Pri urejanju naključnih števil opazimo, da večja kot je razlika med posameznimi števili, manj kot se ponavljajo in so si blizu, hitreje algoritem deluje.
Pri urejanju naključnih števil brez omejitve, je bilo urejanje brez mediane nekoliko hitrejše, ko je pa bil nabor števil omejen, pa počasnejše.

Narascajoce: 0.191
Narascajoce brez mediane: /
Padajoce: 0.222
Padajoce brez mediane: /

Urejanje naraščajočih in padajočih števil je bistveno hitreje kot urejanje naključnih števil.
Če pa poskusimo urejati naraščajoče/padajoče zaporedje brez mediane, pa se program po nekaj minutah sesuje.

*/
