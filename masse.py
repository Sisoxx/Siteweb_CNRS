def calculmasse (ST,VTX,VTOT): #Salinité en g/L, VTX sortie du programme Vtot en mL
    roNACL = 2.16
    roeau = 1
    rotx = 1.061
    cVtx = VTX * 100

    massenacl = ST*VTOT*10**(-3)

    massetx = (cVtx * VTOT/100) * rotx

    masseeau = (VTOT-(cVtx * VTOT/100)- (massenacl / roNACL)) * roeau

    return(massenacl,massetx,masseeau)
