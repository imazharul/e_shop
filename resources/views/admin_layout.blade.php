 $validatedData = $request->validate([
            'company_name' => 'required|max:25',
            'company_address' => 'required|max:255',
            'company_email' => 'required|max:25',
            'company_phone' => 'required',
            'company_mobile' => 'required',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_zipcode' => 'required',
            
        ]);