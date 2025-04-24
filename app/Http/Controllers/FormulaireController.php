<?php

namespace App\Http\Controllers;

use App\Exports\FormulairesExport;
use App\Models\Formulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Formulaire::all();
        return view('formulaire.formulaire', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formIds = array_map('intval', explode(',', $request->form_ids[0]));
        $forms = Formulaire::whereIn('id', $formIds)->get(['email_representative', 'name_organization', 'id']);
        $formData = Http::post('http://127.0.0.1:8000/api/selected-ngo', [
            'forms' => $forms
        ]);

        Formulaire::whereIn('id', $formIds)->update(['is_invited' => true]);

        return back()->with('success', "Emails has been sent to the selected Ngos");
    }

    public function manualStore(Request $request)
    {
        $request->validate([
            'ngo_name' => 'required',
            'representative_name' => 'required',
            'representative_email' => 'required|email'
        ]);

        Formulaire::create([
            'name_organization' => $request->ngo_name,
            'name_representative' => $request->representative_name,
            'email_representative' => $request->representative_email,
            'name_tenderer' => $request->representative_name,
            'email_tenderer' => $request->representative_email,
        ]);



        return redirect()->back();
    }

    public function arrayUpload()
    {
        $data = [
            ['ngo_name' => 'Voice of Youth Society', 'representative_name' => 'Reatlehile Letsie Makateng', 'representative_email' => 'makatengreatlehile@gmail.com'],
            ['ngo_name' => 'Bokamoso Youth Cooperative Society Limited', 'representative_name' => 'Nthatisi Miriam Lesala', 'representative_email' => 'nthatisilesala@gmail.com'],
            ['ngo_name' => 'Commonwealth Youth Council - Africa', 'representative_name' => 'Rosy Schaneck', 'representative_email' => 'rosyschaneck@gmail.com'],
            ['ngo_name' => 'Association HYSOUME', 'representative_name' => 'HAMID YOUSSOUF SOULEYMANE', 'representative_email' => 'hysoume@gmail.com'],
            ['ngo_name' => 'Association ANIR', 'representative_name' => 'Attar Mostafa', 'representative_email' => 'attar4403@gmail.com'],
            ['ngo_name' => 'ONG-Association pour les Initiatives du Development Durable', 'representative_name' => 'Daoulata Amadou Haidara', 'representative_email' => 'daoulahaidara@yahoo.fr'],
            ['ngo_name' => 'Awdal Youth Volunteers', 'representative_name' => 'Shamsudin Abdirahman Dahir', 'representative_email' => 'shamsudiinabdirahman@gmail.com'],
            ['ngo_name' => 'Eshet Children and Youth Development Organization (ECYDO)', 'representative_name' => 'Sisay Tarekegn', 'representative_email' => 'taresisa@gmail.com'],
            ['ngo_name' => 'umunthu plus', 'representative_name' => 'promise msampha', 'representative_email' => 'promisemsampha@umunthuplus.org'],
            ['ngo_name' => 'Conseil National des Jeunes Élus du Bénin (CONAJEB)', 'representative_name' => 'TOHOUENOU Cyrille Ghislain', 'representative_email' => 'cyriltohouenou2@gmail.com'],
            ['ngo_name' => 'CWE-TECH', 'representative_name' => 'Judy Njoki Makira', 'representative_email' => 'judynmakira@gmail.com'],
            ['ngo_name' => 'LADIES CLUB FOR LEADERSHIP', 'representative_name' => 'MOTUE DJOKO KELY MAXIME', 'representative_email' => 'motuekely@gmail.com'],
            ['ngo_name' => 'Mahidol Public Health Association', 'representative_name' => 'Ouedraogo Abdrahamane', 'representative_email' => 'oabdrahamane@gmail.com'],
            ['ngo_name' => 'Association D"aide Aux Jeune en situation difficile Agro Business', 'representative_name' => 'ALHADJ ALI Abdelkerim Medideur', 'representative_email' => 'alhadjaliabdelkerim@gmail.com'],
            ['ngo_name' => 'Emerging-Communities Tech-Up Organization', 'representative_name' => 'Seyi Tytler', 'representative_email' => 'seyi.tytler@emergingcommunities.co'],
            ['ngo_name' => 'Wanatago', 'representative_name' => 'Engineer Odoll Aballa Nyigwo', 'representative_email' => 'Odollaballa9@gmail.com'],
            ['ngo_name' => 'Youth international conclave', 'representative_name' => 'Oumar Mahamat Oussoul', 'representative_email' => 'filsoussoul@gmail.com'],
            ['ngo_name' => 'Youth for Gender Equality Foundation', 'representative_name' => 'Baboloki Semele', 'representative_email' => 'amb.baboloki@gmail.com'],
            ['ngo_name' => 'Solid Stone Advocacy for Health and Education Initiative Africa', 'representative_name' => 'Marwan Umar Gwamba', 'representative_email' => 'gwambamarwan@gmail.com'],
            ['ngo_name' => 'Tunivisions Foundation', 'representative_name' => 'Khlifi Bechir', 'representative_email' => 'khlifibechir7@gmail.com'],
            ['ngo_name' => 'Tahura Charity and development Organization', 'representative_name' => 'Boru kotola Bikole', 'representative_email' => 'borukotola15@gmail.com'],
            ['ngo_name' => 'Women Lead Africa', 'representative_name' => 'Women Lead Africa Trust', 'representative_email' => 'katsolramodia@gmail.com'],
            ['ngo_name' => 'Action des volontaires pour le développement communautaire', 'representative_name' => 'François KAYEMBE', 'representative_email' => 'francoiskayembe848@gmail.com'],
            ['ngo_name' => 'Climatic Peace foundation', 'representative_name' => 'Ahmed Salem Abdelghany Ali', 'representative_email' => 'Ahmedsalem@climaticpeace.org'],
            ['ngo_name' => 'Youth Alliance for Leadership and Development in Africa Botswana', 'representative_name' => 'Botshelo Tsogo Tiroyamodimo', 'representative_email' => 'tsogobotshelo@gmail.com'],
            ['ngo_name' => 'Réseau des Organisations de Jeunesse Africaine Leaders de Nations-Unies (ROJALNU)', 'representative_name' => 'MOMBO LOKO Sergi Alban', 'representative_email' => 'msergialban@gmail.com'],
            ['ngo_name' => 'Living Vines Mental Health Foundation', 'representative_name' => 'Olakunbi Oyedele', 'representative_email' => 'livingvinesmentalhealthfoundation@livingvines.co'],
            ['ngo_name' => 'جمعية الواحة للثقافة والتربية والتنمية الاجتماعية', 'representative_name' => 'بنشريف مولاي محمد', 'representative_email' => 'benchrif1973@gmail.com'],
            ['ngo_name' => 'Association Tunisienne des femmes démocrates', 'representative_name' => 'Hela Ben Salem', 'representative_email' => 'bensalem-hela@hotmail.fr'],
            ['ngo_name' => 'Entrepreneur Z', 'representative_name' => 'Bassock Olivier Armand', 'representative_email' => 'olivier@schule-z.com'],
            ['ngo_name' => 'Agency for Rural and Urban Development (ARUD)', 'representative_name' => 'Masereka Kikumbwa Godfrey', 'representative_email' => 'godfreymaserekakikumbwa33@gmail.com'],
            ['ngo_name' => 'EasyZambia (EasyZed Initiative)', 'representative_name' => 'Chiteu Kasongo', 'representative_email' => 'chiteukasongo@easyzambia.org'],
            ['ngo_name' => 'Africa-YOFIM', 'representative_name' => 'BA Bocar Abdoulaye', 'representative_email' => 'babocarba@gmail.com'],
            ['ngo_name' => 'Model AU Ethiopia', 'representative_name' => 'Melak Hailu', 'representative_email' => 'mauethiopia@gmail.com'],
            ['ngo_name' => 'Gambia Youth Chamber of Commerce', 'representative_name' => 'Modou Lamin Gassama', 'representative_email' => 'gassamamodoulamin@gmail.com'],
            ['ngo_name' => 'Lim Nguen Foundation', 'representative_name' => 'Yoal Wuol Lim', 'representative_email' => 'limnf21@gmail.com'],
            ['ngo_name' => 'Conselho Nacional da Juventude de São Tomé e Príncipe', 'representative_name' => 'Adnilson de Sousa Pereira Rosa', 'representative_email' => 'abdusousa77@gmail.com'],
            ['ngo_name' => 'FINSJOR- Fórum de Intervenção Social das Jovens Raparigas', 'representative_name' => 'Muscuta Fati', 'representative_email' => 'finsjor@gmail.com'],
            ['ngo_name' => 'PADEFJ', 'representative_name' => 'Assiétou HANE', 'representative_email' => 'assitouhane1@gmail.com'],
            ['ngo_name' => 'Darfur Youth Centre for Peace and Development', 'representative_name' => 'Bakheet Suliman Adam Abdallah', 'representative_email' => 'TPadvisor@darfuryouth.org'],
            ['ngo_name' => 'DigiFemmes Côte d"Ivoire', 'representative_name' => 'Nadine Zoro', 'representative_email' => 'nadine@digifemmes.com'],
            ['ngo_name' => 'Jeunesse Francophone Congolaise', 'representative_name' => 'Jadore MOUSSOKI Au Carré', 'representative_email' => 'jfcbrazzavilleassociation@gmail.com'],
            ['ngo_name' => 'Eshet Children and Youth Development Organization (ECYDO)', 'representative_name' => 'Sisay Tarekegn', 'representative_email' => 'taresisa@gmail.com'],
            ['ngo_name' => 'JEUNESSE MIGRATION DEVELOPPEMENT JMD-HIJRA', 'representative_name' => 'Almoctar MOUMOUNI ISSA', 'representative_email' => 'almoctar27.am@gmail.com'],
            ['ngo_name' => 'Bue Fixe- Associacao de Jovens/Organization de Jeune', 'representative_name' => 'Aylina da Costa', 'representative_email' => 'grupobuefixe@gmail.com'],
            ['ngo_name' => 'AQJ - Association Qualification des Jeunes', 'representative_name' => 'Mme. Oumayma OUGUENNOUS', 'representative_email' => 'oumaymaouguennousaqj@gmail.com'],
            ['ngo_name' => 'Kumbekumbe Arts', 'representative_name' => 'Amanda Makombe', 'representative_email' => 'amandachenai38@gmail.com'],
            ['ngo_name' => 'Women Lead Africa', 'representative_name' => 'Katso Lizarene Ramodia', 'representative_email' => 'katsolramodia@gmail.com'],
            ['ngo_name' => 'Youth for Gender Equality Foundation', 'representative_name' => 'Baboloki Semele', 'representative_email' => 'amb.baboloki@gmail.com'],
            ['ngo_name' => 'Conselho Nacional da Juventude - CNJ', 'representative_name' => 'Adnilson de Sousa Pereira Rosa', 'representative_email' => 'abdusousa77@gmail.com'],
            ['ngo_name' => 'Croissant-Rouge Comorien', 'representative_name' => 'Daniel Ali Soumaili', 'representative_email' => 'soumaildani@gmail.com'],
            ['ngo_name' => 'NAFASS AFRICA', 'representative_name' => 'CATHERINE BARUT', 'representative_email' => 'catherine.barut@nafass-africa.org'],
            ['ngo_name' => 'Association Maçons de l"Education', 'representative_name' => 'Mahamane Mourtala Salissou', 'representative_email' => 'salissou_10@yahoo.fr'],
            ['ngo_name' => 'Idris Ojoko Foundation', 'representative_name' => 'Jibrin Idris Ojoko', 'representative_email' => 'Idrisojoko@gmail.com'],
            ['ngo_name' => 'union panafricaine pour le developpement', 'representative_name' => 'bamogo djibril', 'representative_email' => 'bamogodjibril@gmail.com'],
            ['ngo_name' => 'Destination Imagination Botswana', 'representative_name' => 'Sally Kimangu', 'representative_email' => 'sally@di4africa.org'],
            ['ngo_name' => 'ASSOCIATION INITIATIVE URBAINE', 'representative_name' => 'Mr ABDELJALIL BAKKAR', 'representative_email' => 'a.bakkar@iuhm.org'],
        ];


        foreach ($data as $ngo) {
            Formulaire::create([
                'name_organization' => $ngo['ngo_name'],
                'name_representative' => $ngo['representative_name'],
                'email_representative' => $ngo['representative_email'],
                'name_tenderer' => $ngo['representative_name'],
                'email_tenderer' => $ngo['representative_email'],
            ]);
        }


        return redirect()->route('form.index');
    }

    public function invite(Formulaire $form)
    {

        //get email
        $response = Http::post('http://127.0.0.1:8001/api/receive-data', [
            'email' => $form->email_representative,
            'name' => $form->name_organization
        ]);

        $form->update([
            'is_invited' => true
        ]);

        return back()->with('success', "Ngo has been invited to yes learning successfully!!!");

        // dd($response->body());
        // dd($response->json());
        // dd($form->email_representative);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formulaire $form)
    {
        return view('formulaire.partials.formulaire_show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulaire $formulaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulaire $formulaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulaire $form)
    {
        $files = [
            $form->presentation,
            $form->legal_statutes,
            $form->internal_regulations,
            $form->project_description,
            $form->funding_requirements,
            $form->project_evaluation,
            $form->other_projects
        ];

        foreach ($files as $file) {
            if ($file) {
                Storage::disk('public')->delete($file);
            }
        }

        $form->delete();
        return back()->with('success', "The Form and it's Files were deleted Successfully!!");
    }




    public function export()
    {
        return Excel::download(new FormulairesExport, 'form.xlsx');
    }
}
