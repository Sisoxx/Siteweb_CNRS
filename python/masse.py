from opti import optiFonction



def calculmasse (T,ST,V1,RLOI,input_choice, low_range_input, high_range_input,round_step_input,VTOT):
    Inutile, ST,VTX, inutile, inut,inutii = optiFonction(T,ST,V1,RLOI,input_choice, low_range_input, high_range_input,round_step_input)
    roNACL = 2.16
    roeau = 1
    rotx = 1.061
    cVtx = VTX * 100

    massenacl = ST*VTOT*10**(-3)

    massetx = (cVtx * VTOT/100) * rotx

    masseeau = (VTOT-(cVtx * VTOT/100)- (massenacl / roNACL)) * roeau
    #if massenacl<0:
    #    return (0,massetx,masseeau)
    #if massetx <0 :
    #    return (massenacl,0,masseeau)
    #if masseeau<0:
    #    return (massenacl,massetx,0)



    return(massenacl,massetx,masseeau)
